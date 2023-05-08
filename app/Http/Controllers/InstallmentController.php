<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Booking_installment;
use App\Models\Booking_order;
use App\Models\Customer;
use App\Models\Franchise;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstallmentController extends Controller
{
    public function create(){
        $customer = Customer::all();
        return view('installments.add',compact('customer'));
    }

    public function show_customer_info($id){
        $customer_info = Customer::with('installments')->with('booking.plot.block')->find($id);

        return $customer_info;
    }

    public function show($id){
        // $installment = Customer::with('bookings')->with('installments')->with('booking_orders')->where('id',$id)->first();
        $installment = Customer::with('booking.plot.block')->with('installments')->with('booking_orders')->where('id',$id)->first();

        // dd($installment);
        if(!is_null($installment)){
            return view('installments.manage',compact('installment'));
        }
        else{
            $installment = Customer::with('booking.plot.block')->with('installments')->with('booking_orders')->where('id',$id)->onlyTrashed()->first();
            // dd($installment);
            return view('installments.manage',compact('installment'));
        }
    }

    public function viwe_all_invoices($id){
        $invoice = Customer::with('booking.plot.block')->with('installments')->with('booking_orders')->find($id);
        $date =  Carbon::now()->format('d/m/yy');
        
        
        
        // dd($invoice->bookings->down_payment);
        
        // dd($installment);
        if(!is_null($invoice)){
            $count_installment = $invoice->installments->count();
            return view('installments.all_invoice',compact('invoice','date','count_installment'));
        }
        else{
            $invoice = Customer::with('booking.plot.block')->with('installments')->with('booking_orders')->onlyTrashed()->find($id);
            $count_installment = $invoice->installments->count();
            return view('installments.all_invoice',compact('invoice','date','count_installment'));
        }
    }

    public function store(Request $request){
        $installment = new Booking_installment();
        $installment->booking_order_id = $request->booking_order_id;
        $installment->booking_id = $request->booking_id;
        $installment->customer_id = $request->customer_id;
        $installment->installment_amount = $request->ins_amount;
        $installment->installment_details = $request->ins_details;

        $booking_order = Booking_order::with('user.franchise')->find($request->booking_order_id);
        // $franchise = Franchise::where('user_id',$booking_order->user->id)->first();
        // dd($booking_order);
        $total = $booking_order->total_amount;
        $booking_order->total_amount = $total - $request->ins_amount;
        $booking_order->save();
        
        if($installment->save()){
            $franchise = Franchise::where('user_id',$booking_order->user->id)->first();
            // dd($franchise);
            if($franchise != null){
                $franchise->total_amount += $request->ins_amount;
                $franchise->save();
            }
            $customer = Customer::find($request->customer_id);
            $customer->last_payment = Carbon::now();
            $customer->save();
            return redirect('/get_unique_invoice/'.$installment->id.'/'.$request->customer_id);
        }
        else{
            return redirect()->back()->with('error','Installment Not paid Server Issu');
        }
    }
    public function get_unique_invoice($ins_id,$id){
        $invoice = Customer::with('booking.plot.block')->with('installments')->with('booking_orders')->find($id);
        // dd($invoice);
        $date =  Carbon::now()->format('d/m/yy');
        if(!is_null($invoice)){
            $current_installent = Booking_installment::find($ins_id);
            $count_installment = $current_installent->count();
            return view('installments.previus_invoice',compact('invoice','date','count_installment','current_installent'));
        }
        else{
            $invoice = Customer::with('booking.plot.block')->with('installments')->with('booking_orders')->onlyTrashed()->find($id);
            $current_installent = Booking_installment::find($ins_id);
            $count_installment = $current_installent->count();
            return view('installments.previus_invoice',compact('invoice','date','count_installment','current_installent'));
        }
    }

    public function delete_invoice($id,$c_id){
        $installment = Booking_installment::find($id);
        $deleted_installment_amount = $installment->installment_amount;
        $booking_order = Booking_order::find($installment->booking_order_id);
        if($installment->delete()){
            $booking_order->total_amount += $deleted_installment_amount;
            if($booking_order->save()){
                return redirect('installment/show/'.$c_id);
            }
        }
    }

    public function edit_installment($id){
        $installment = Booking_installment::find($id);

        return view('installments.edit',compact('installment'));
    }

    public function update_customer_installment(Request $request){
        $installment = Booking_installment::find($request->id);
        $amount = $installment->installment_amount -=$request->ins_amount;
        $installment->installment_amount = $request->ins_amount;
        $installment->installment_details = $request->ins_details;
        if($installment->save()){
            $booking = Booking_order::find($request->booking_order_id);
            $booking->total_amount += $amount;
            if($booking->save()){
                return redirect('/edit_customer_installment/'.$request->id)->with('success','Insallmemnt Updated');
            }
            else{
                return redirect()->back()-with('error','Installment Not Update');
            }
        }
    }

    public function create_customer_installment($c_id,$b_o_id,$b_id){
        return $c_id." ".$b_o_id." ".$b_id;
    }

    public function remaining_installment_users(){
        // $now = Carbon::now();
        // $currentMonth = $now->month;
        // $currentYear = $now->year;
        // $users = Customer::whereHas('installments', function ($query) use ($currentMonth, $currentYear) {
        //     dd($query);
        //     $query->whereMonth('created_at','!=',Carbon::now());
        // })->get();
        $customer_ids = array();
        $customers = DB::table('customers')
            ->leftJoin('booking_installments', function($join) {
                $join->on('customers.id', '=', 'booking_installments.customer_id')
                     ->whereRaw('MONTH(booking_installments.created_at) = MONTH(NOW())');
            })
            ->whereNull('booking_installments.id')
            ->select('customers.id','customers.last_payment')
            ->whereNull('deleted_at')
            ->get();
            // ->filter(function ($customers) {
            //     $lastPaymentDate = Carbon::parse($customers->last_payment);
            //     $monthsDifference = $lastPaymentDate->diffInMonths(Carbon::now());

            //     return $monthsDifference >= 1;
            // });
        //  dd($customers);
        foreach($customers as $customer){
            array_push($customer_ids,$customer->id);
        } 

        $customer = Customer::with('bookings')->with('booking.plot.block')->get();
        if(!is_null($customer)){
            return view('agents.installments.current_month_defaulter',compact('customer','customer_ids'));
        }

        // dd($customer_ids);
    }
}

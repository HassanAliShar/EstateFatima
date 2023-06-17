<?php

namespace App\Http\Controllers;

use App\Models\Booking_installment;
use App\Models\Customer;
use App\Models\Franchise;
use App\Models\FranchisePayment;
use App\Models\Sub_agent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FranchisePaymentController extends Controller
{
    public function franchise_payments($id){
        $franchise_payments = FranchisePayment::with('franchise.user')->where('franchise_id',$id)->get();
        return view('franchise.payments.manage',compact('franchise_payments'));
    }

    public function edit($id){
        $payment = FranchisePayment::find($id);
        return view('franchise.payments.edit',compact('payment'));
    }

    public function update(Request $request){
        $payment = FranchisePayment::find($request->id);
        $payment->total_amount = $request->total_amount;
        $payment->paid_amount = $request->payable_amount;
        $payment->commission = $request->agent_commission;
        if($payment->update()){
            return redirect()->back()->with('success',"Franchise Payment Updated Successfully");
        }
        else{
            return redirect()->back()->with('error',"Something went wrong please contact Developer");
        }
    }

    public function delete($id){
        $payments = FranchisePayment::find($id);
        if($payments->delete()){
            return redirect()->back()->with('success',"Franchise Payment Deleted");
        }
        else{
            return redirect()->back()->with('error',"Something went wrong please contact Developer");
        }
    }

    public function history($id,$franchise_id,$date){
        $lastPaymentBeforeGivenDate = FranchisePayment::where('created_at', '<', $date)
        ->orderBy('created_at', 'desc')
        ->where('franchise_id',$franchise_id)
        ->first();
        $franchise = Franchise::find($franchise_id);
        $startDate = $lastPaymentBeforeGivenDate->created_at ?? $franchise->created_at;
        $endDate = Carbon::parse($date);
        $customers = Customer::with('booking.booking_order.sub_agent_get')
        ->with('booking',function ($query) use ($startDate, $endDate) {
            $query->where('created_at', '>=',$startDate)->where('created_at','<=',$endDate);
        })
        ->with(['installments' => function ($querys) use ($startDate, $endDate) {
            $querys->where('created_at', '>=',$startDate)->where('created_at','<=',$endDate);
        }])
        ->where('created_by',$id)->get();

        $sub_agents = Sub_agent::with(['installments' => function ($querys) use ($startDate, $endDate) {
            $querys->where('created_at', '>=',$startDate)->where('created_at','<=',$endDate);
        }])->get();

        $lastPayment = FranchisePayment::where('created_at', '=', $date)
        ->where('franchise_id',$franchise_id)
        ->first();

        // dd($lastPayment);

        return view('franchise.payments.history',compact('customers','sub_agents','lastPayment'));

    }
}

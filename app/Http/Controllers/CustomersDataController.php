<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Booking_installment;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomersDataController extends Controller
{
    public function index(){
        return view('users.info');
    }

    public function search_user_info(Request $request){
        $booking = Booking::find($request->file_no);
        if(!is_null($booking)){
            $customer = Customer::with('booking.plot.block')->find($booking->customer_id);
            // dd($customer);
            if(!is_null($customer)){
                if($request->mobile_no == $customer->mobile_no){
                    return redirect('/user/file/info/'.base64_encode(base64_encode($customer->id)));
                }
                else{
                    return redirect()->back()->with('error',"Invalid Mobile No");
                }
            }
            else{
                return redirect()->back()->with('error',"File ".$request->file_no." has been cancelled");
            }
        }
        else{
            return redirect()->back()->with('error',"Invalid File No");
        }
    }

    public function get_user_file($customer_id){
        $customer = Customer::with('booking.plot.block')->find(base64_decode(base64_decode($customer_id)));
        if(!is_null($customer)){
            return view('users.details',compact('customer'));
        }
        else{
            return redirect()->back()->with('error',"File has been cancelled");
        }
    }

    public function get_unique_invoice($ins_id,$id){
        $invoice = Customer::with('booking.plot.block')->with('installments')->with('booking_orders')->find($id);
        // dd($invoice);
        $date =  Carbon::now()->format('d/m/yy');
        if(!is_null($invoice)){
            $current_installent = Booking_installment::find($ins_id);
            $count_installment = $current_installent->count();
            return view('users.installment_view',compact('invoice','date','count_installment','current_installent'));
        }
        else{
            $invoice = Customer::with('booking.plot.block')->with('installments')->with('booking_orders')->onlyTrashed()->find($id);
            $current_installent = Booking_installment::find($ins_id);
            $count_installment = $current_installent->count();
            return view('users.installment_view',compact('invoice','date','count_installment','current_installent'));
        }
    }
}

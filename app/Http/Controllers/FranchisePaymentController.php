<?php

namespace App\Http\Controllers;

use App\Models\FranchisePayment;
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
}

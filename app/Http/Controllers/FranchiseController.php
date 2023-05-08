<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use App\Models\FranchisePayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FranchiseController extends Controller
{
    public function index(){
        // $users = Franchise::with('user')->get();
        $users = User::with('franchise')->where('role_id',2)->where('status',0)->get();
        // dd($users);
        return view('franchise.manage',compact('users'));
    }

    public function add(){
        return view('franchise.add');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:8',
            'mobile_no' => 'required|numeric|gt:10',
            'f_name' => 'required|string',
            'percent' => 'required|numeric',
            'f_limit' => 'required|numeric',
        ],[
            'gt:mobile_no' => 'Enter valid mobile no',
            'required:f_name' => "Franchise Name is Required",
            'required:f_limit' => "Franchise Limit Amount is Required",
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->mobile_no = $request->mobile_no;
        $user->address = $request->address;
        $user->cnic_no = $request->cnic;
        $user->role_id = 2;
        $user->status = 0;

        if($user->save()){
            // $last_added_user = User::orderby('id','desc')->first();
            $franchise = new Franchise();
            $franchise->name = $request->f_name;
            $franchise->owner_name = $request->name;
            $franchise->percent = $request->percent;
            $franchise->user_id = $user->id;
            $franchise->address = $request->address;
            $franchise->city = $request->f_city;
            $franchise->phone = $request->f_phone;
            $franchise->limit_amount = $request->f_limit;
            $franchise->total_amount = 0;
            $franchise->status = 0;
            if($franchise->save()){
                return redirect('/franchise/add')->with('success','Franchise Added Successfuly');
            }
            else{
                return redirect()->back()->with('error','Franchise Not Added');
            }
        }
        else{
            return redirect()->back()->with('error','Something Went Wrong');
        }


    }

    public function franchise_active($id){
        $franchise = Franchise::find($id);
        $payment = new FranchisePayment();
        $payment->franchise_id = $franchise->id;
        $payment->total_amount = $franchise->total_amount;
        $payment->paid_amount = $franchise->total_amount * (1-($franchise->percent/100));
        $payment->commission = $franchise->total_amount * (($franchise->percent/100));
        $payment->save();
        $franchise->total_amount = 0;
        if($franchise->save()){
            // toastr()->error("Franchise Activated");
            return redirect()->back()->with('success',"Franchise activated successfully");
        }
    }

    public function edit($id){
        $user = User::with('franchises')->find($id);
        return view('franchise.edit',compact('user'));
    }
    public function update(Request $request){
        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_no = $request->mobile_no;
        $user->address = $request->address;
        $user->cnic_no = $request->cnic;
        $user->role_id = 2;
        $user->status = 0;

        if($user->save()){
            $franchise = Franchise::find($request->f_id);
            $franchise->name = $request->f_name;
            $franchise->owner_name = $request->name;
            $franchise->address = $request->address;
            $franchise->city = $request->f_city;
            $franchise->phone = $request->f_phone;
            $franchise->limit_amount = $request->f_limit;
            $franchise->total_amount = 0;
            $franchise->status = 0;
            if($franchise->save()){
                return redirect('/franchise/edit/'.$request->user_id)->with('success','Franchise Updated Successfuly');
            }
            else{
                return redirect()->back()->with('error','Franchise Not Updated');
            }
        }
        else{
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }
    public function delete($id){
        $user = User::find($id);
        $user->status = 1;
        if($user->save()){
            return redirect('franchise')->with('success','Franchise Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }
}

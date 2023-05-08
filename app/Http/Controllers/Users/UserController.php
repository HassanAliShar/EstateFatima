<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($id){
        $user = User::where('id',$id)->first();

        return view('profile.index',compact('user'));
    }
    public function update_profile(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_no = $request->mobile_no;
        $user->address = $request->address;
        $user->cnic_no = $request->cnic_no;
        $user->status = 1;
        if($user->save()){
            $success_message = "User Updated Successfully";
            return back()->with('success_message');
        }
        else{
            $error_message = "Some Thing Went Wrong";
            return back()->with('error_message');
        }

    }
}

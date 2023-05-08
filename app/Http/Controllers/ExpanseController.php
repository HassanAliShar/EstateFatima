<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use App\Models\Franchise_expence;
use App\Models\User;
use Illuminate\Http\Request;

class ExpanseController extends Controller
{
    public function index(){
        $expanse = Franchise_expence::all();

        $user=[];
        foreach($expanse as $row){
            $user = User::find($row->user_id);
            $franchise = Franchise::find($row->franchise_id);
        }

        return view('expenses.manage',compact('expanse','user','franchise'));
    }

    public function create(){
        return view('expenses.add');
    }

    public function edit($id){
        $expanse = Franchise_expence::find($id);

        return view('expenses.edit',compact('expanse'));
    }

    public function store(Request $request){
        $expanse = new Franchise_expence();
        $expanse->name = $request->name;
        $expanse->details = $request->details;
        $expanse->franchise_id = $request->f_id;
        $expanse->amount = $request->amount;
        $expanse->user_id = $request->user_id;
        if($expanse->save()){
            return redirect('/expanse/add')->with('success','Expanse Added Successfully');
        }
        else{
            return redirect()->back()->with('error'.'Expanse Not Added');
        }
    }

    public function update(Request $request){
        $expanse = Franchise_expence::find($request->id);
        $expanse->name = $request->name;
        $expanse->details = $request->details;
        $expanse->amount = $request->amount;
        if($expanse->save()){
            return redirect('/expanse')->with('success','Expanse Update Successfully');
        }
        else{
            return redirect()->back()->with('error'.'Expanse Not Updated');
        }
    }

    public function delete($id){
        $expanse = Franchise_expence::find($id);
        if($expanse->delete()){
            return redirect('/expanse')->with('success','Expanse Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error'.'Expanse Not Deleted');
        }
    }
}

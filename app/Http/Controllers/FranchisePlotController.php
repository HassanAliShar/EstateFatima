<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Block_category;
use App\Models\FranchisePlot;
use Illuminate\Http\Request;

class FranchisePlotController extends Controller
{
    public function index(){
        $plots = FranchisePlot::with('block')->get();
        return view('agents.plots.manage',compact('plots'));
    }

    public function add(){
        $blocks = Block::all();
        $block_cat = Block_category::all();
        return view('agents.plots.add',compact('blocks','block_cat'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|numeric',
            'block' => 'required|numeric',
            'type' => 'required|numeric',
            'size' => 'required|string',
            'total_price' => 'required|numeric',
            'downpay' => 'required|numeric',
            'installmentpay' => 'required|numeric',
        ]);
        $plot = new FranchisePlot();
        $plot->name = "Plot ".$request->name;
        $plot->block_id = $request->block;
        $plot->block_type_id = $request->type;
        $plot->size = $request->size;
        $plot->total_price = $request->total_price;
        $plot->down_payment = $request->downpay;
        $plot->status = 0;
        $plot->user_id = auth()->user()->id;
        $plot->confirm_status = 'Pending';
        $plot->ins_payment = $request->installmentpay;
        if($plot->save()){
            return redirect()->back()->with('success','Plot Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Plot Not Added');
        }
    }

    public function edit($id){
        $blocks = Block::all();
        $block_cat = Block_category::all();
        $plot = FranchisePlot::find($id);
        // dd($plot);
        return view('agents.plots.edit',compact('blocks','block_cat','plot'));
    }

    public function update(Request $request){
        $request->validate([
            'name'=>'required|string',
            'block' => 'required|numeric',
            'type' => 'required|numeric',
            'size' => 'required|string',
            'total_price' => 'required|numeric',
            'downpay' => 'required|numeric',
            'installmentpay' => 'required|numeric',
        ]);
        $plot = FranchisePlot::find($request->id);
        $plot->name = $request->name;
        $plot->block_id = $request->block;
        $plot->block_type_id = $request->type;
        $plot->size = $request->size;
        $plot->total_price = $request->total_price;
        $plot->down_payment = $request->downpay;
        $plot->status = 0;
        $plot->user_id = auth()->user()->id;
        $plot->confirm_status = 'Pending';
        $plot->ins_payment = $request->installmentpay;
        if($plot->update()){
            return redirect()->back()->with('success','Plot Updated Successfully');
        }
        else{
            return redirect()->back()->with('error','Plot Not updated');
        }
    }

    public function delete($id){
        $plot = FranchisePlot::find($id);
        if($plot->delete()){
            return redirect()->back()->with('success','Plot Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Plot Not Deleted');
        }
    }
}

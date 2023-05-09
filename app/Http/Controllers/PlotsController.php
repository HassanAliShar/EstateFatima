<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Block_category;
use App\Models\FranchisePlot;
use App\Models\Plot;
use Illuminate\Http\Request;

class PlotsController extends Controller
{
    public function index(){
        $plots = Plot::with('block')->get();
        return view('plots.manage',compact('plots'));
    }

    public function add(){
        $blocks = Block::all();

        $block_cat = Block_category::all();
        return view('plots.add',compact('blocks','block_cat'));
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
        $plot = new Plot();
        $plot->name = "Plot ".$request->name;
        $plot->block_id = $request->block;
        $plot->block_type_id = $request->type;
        $plot->size = $request->size;
        $plot->total_price = $request->total_price;
        $plot->down_payment = $request->downpay;
        $plot->status = 0;
        $plot->ins_payment = $request->installmentpay;
        if($plot->save()){
            return redirect('plots/add')->with('success','Plot Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Plot Not Added');
        }
    }

    public function show_plot_blockid($block_id,$cat_id){
        $plots = Plot::where('block_id',$block_id)->where('block_type_id',$cat_id)->where('status',0)->get();

        return $plots;
    }

    public function edit($id){
        $blocks = Block::all();
        $block_cat = Block_category::all();
        $plot = Plot::find($id);
        // dd($plot);
        return view('plots.edit',compact('blocks','block_cat','plot'));
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
        $plot = Plot::find($request->id);
        $plot->name = $request->name;
        $plot->block_id = $request->block;
        $plot->block_type_id = $request->type;
        $plot->size = $request->size;
        $plot->total_price = $request->total_price;
        $plot->down_payment = $request->downpay;
        $plot->status = 0;
        $plot->ins_payment = $request->installmentpay;
        if($plot->update()){
            return redirect()->back()->with('success','Plot Updated Successfully');
        }
        else{
            return redirect()->back()->with('error','Plot Not updated');
        }
    }

    public function delete($id){
        $plot = Plot::find($id);
        if($plot->delete()){
            return redirect()->back()->with('success','Plot Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Plot Not Deleted');
        }
    }

    public function getplot($id){
        $plot = Plot::find($id);
        return $plot;
    }

    public function get_franchises_plots(){
        $blocks = Block::all();
        $block_cat = Block_category::all();
        $franchises_plots = FranchisePlot::with('user')->where('confirm_status','Pending')->get();
        return view('plots.franchise.added',compact('blocks','block_cat','franchises_plots'));
    }


    public function accept_plot(Request $request,$id){
        $request->validate([
            'name'=>'required|string',
            'block' => 'required|numeric',
            'type' => 'required|numeric',
            'size' => 'required|string',
            'total_price' => 'required|numeric',
            'downpay' => 'required|numeric',
            'installmentpay' => 'required|numeric',
        ]);
        $plot = new Plot();
        $plot->name = $request->name;
        $plot->block_id = $request->block;
        $plot->block_type_id = $request->type;
        $plot->size = $request->size;
        $plot->total_price = $request->total_price;
        $plot->down_payment = $request->downpay;
        $plot->status = 0;
        $plot->ins_payment = $request->installmentpay;
        if($plot->save()){
            $franchise_plot = FranchisePlot::find($id);
            $franchise_plot->confirm_status = "Accepted";
            $franchise_plot->update();
            return redirect()->back()->with('success','Plot Accepted Successfully');
        }
        else{
            return redirect()->back()->with('error','Plot Not Accepted');
        }
    }

    public function reject_plot($id){
        $franchise_plot = FranchisePlot::find($id);
        $franchise_plot->confirm_status = "Rejected";
        if($franchise_plot->update()){
            return redirect()->back()->with('success','Plot Rejected Successfully');
        }
        else{
            return redirect()->back()->with('error','Plot Not Rejected');
        }
    }

    public function get_plot_with_block($block_id,$id){
        $plot = Plot::where('block_id',$block_id)->where('name',$id)->first();
        return $plot;
    }
}

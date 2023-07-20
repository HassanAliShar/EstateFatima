<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function index(){
        $blocks = Block::all();
        return view('blocks.manage',compact('blocks'));
    }

    public function edit($id){
        $block = Block::find($id);
        return view('blocks.edit',compact('block'));
    }

    public function create(){
        return view('blocks.add');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:50',
            'start' => 'required|numeric',
            'end' => 'required|numeric|gt:start',
        ],[
            'end.gt' => 'The End number must be greater than the start number.',
        ]);
        $block = new Block();
        $block->name = $request->name;
        $block->start = $request->start;
        $block->end = $request->end;

        if($block->save()){
            return redirect('/block/add')->with('success','Block Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Block Not Added');
        }
    }

    public function update(Request $request){
        $block = Block::find($request->id);
        $block->name = $request->name;
        $block->start = $request->start;
        $block->end = $request->end;
        if($block->save()){
            return redirect('/blocks')->with('success','Block Updated Successfully');
        }
        else{
            return redirect()->back()->with('error','Block Not Updated');
        }
    }

    public function delete($id){
        $delete = Block::find($id);
        if($delete->delete()){
            return redirect('/blocks')->with('success','Block Deleted');
        }
        else{
            return redirect()->back()->with('error','Block Not Deleted');
        }

    }
}

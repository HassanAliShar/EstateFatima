<?php

namespace App\Http\Controllers;

use App\Models\Sub_agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubAgentController extends Controller
{
    public function index(){
        $sub_agents = Sub_agent::where('created_by',Auth::user()->id)->get();
        return view('agents.sub_agents.manage',compact('sub_agents'));
    }

    public function add(){
        return view('agents.sub_agents.add');
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required|string',
            'percentage' => 'required|numeric',
        ]);
        $subagent = new Sub_agent();
        $subagent->name = $request->name;
        $subagent->percentage = $request->percentage;
        $subagent->created_by = Auth::user()->id;
        if($subagent->save()){
            return redirect()->back()->with('success','Agent Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Agent Not Added');
        }
    }

    public function edit($id){
        $subagent = Sub_agent::find($id);
        return view('agents.sub_agents.edit',compact('subagent'));
    }

    public function update(Request $request){
        $subagent = Sub_agent::find($request->id);
        $subagent->name = $request->name;
        $subagent->percentage = $request->percentage;
        if($subagent->update()){
            return redirect()->back()->with('success','Agent Updated Successfully');
        }
        else{
            return redirect()->back()->with('error','Agent Not Updated');
        }
    }

    public function destroy($id){
        $agent = Sub_agent::find($id);
        if($agent->delete()){
            return redirect()->back()->with('success','Agent Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Agent Not Deleted');
        }
    }
}

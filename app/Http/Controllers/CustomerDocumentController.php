<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class CustomerDocumentController extends Controller
{
    public function index($id){
        $documents = Document::where('customer_id',$id)->get();
        return view('doucments.manage',compact('documents','id'));
    }

    public function add($id){

        return view('doucments.add',compact('id'));
    }

    public function store(Request $request,$id){
        $document = new Document();
        $document->name = $request->docname;
        $document->customer_id = $id;
        $document->created_by = auth()->user()->id;
        if ($files = $request->file('image')){
            // Define upload path
            $destinationPath = public_path('/customer_documents/'); // upload path
            // Upload Orginal Image
            $doc_image = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $doc_image);

            $insert['image'] = "$doc_image";
            // Save In Database
            $document->images="$doc_image";
        }
        if($document->save()){
            return redirect()->back()->with('success','Document Added successfully');
        }
        else{
            return redirect()->back()->with('error','Document Not Added');
        }
    }

    public function view($id){
        $document = Document::find($id);
        return view('doucments.view',compact('document','id'));
    }
    public function edit($id){
        $document = Document::find($id);
        return view('doucments.edit',compact('document','id'));
    }

    public function update(Request $request,$id){
        $document = Document::find($id);
        $document->name = $request->docname;
        $document->customer_id = $id;
        $document->created_by = auth()->user()->id;
        if ($files = $request->file('image')){
            // Define upload path
            $destinationPath = public_path('/customer_documents/'); // upload path
            // Upload Orginal Image
            $doc_image = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $doc_image);

            $insert['image'] = "$doc_image";
            // Save In Database
            $document->images="$doc_image";
        }
        if($document->update()){
            return redirect()->back()->with('success','Document Updated successfully');
        }
        else{
            return redirect()->back()->with('error','Document Not Updated');
        }
    }

    public function delete($id){
        $delete = Document::find($id);
        if($delete->delete()){
            return redirect()->back()->with('success','Document Deleted');
        }
        else{
            return redirect()->back()->with('error','Document Not Deleted');
        }

    }
}

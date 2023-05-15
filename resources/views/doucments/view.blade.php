@extends('layouts.layout')

@section('content')
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-plus-circle'></i> Customer Documents

    </h1>
    <a href="" class="btn btn-primary waves-effect waves-themed text-white" onclick="printSection('p_page')"><i class="fal fa-print"></i> Print Documents</a>
    <a href="{{ route('customer.document.add',$id) }}" class="btn btn-success waves-effect waves-themed text-white"><i class="fal fa-plus"></i>Add Document</a>
</div>
<div class="container" id="p_page">
    <div data-size="A4" >
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex align-items-center mb-5">
                    <h2 class="keep-print-font fw-500 mb-0 text-primary flex-1 position-relative">
                        FatimaKashmiri City
                        <!-- barcode demo only -->
                        <img id="barcode" alt="" class="position-absolute pos-top pos-right height-3 mt-1 hidden-md-down" src="data:image/png;base64,">
                    </h2>
                </div>
                <h3 class="color-primary-600 keep-print-font pt-4 m-0">
                   Customer's Documents Details
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-xl-6">
                <h3>{{ $document->name ?? "Not Given" }}</h3>
                <img src="{{ asset('customer_documents') }}/{{ $document->images ?? 'no_image.png' }}" style="width: 100%;" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

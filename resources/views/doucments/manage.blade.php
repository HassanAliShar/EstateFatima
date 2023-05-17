@extends('layouts.layout')


@section('content')
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-plus-circle'></i>Manage Customer Documents

    </h1>
    {{-- <a href="" class="btn btn-primary waves-effect waves-themed text-white" onclick="printSection('p_page')"><i class="fal fa-print"></i> Print Documents</a> --}}
    <a href="{{ route('customer.document.add',$id) }}" class="btn btn-success waves-effect waves-themed text-white"><i class="fal fa-plus"></i>Add Document</a>
</div>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Manage  <span class="fw-300"><i>Customer Documents</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <!-- datatable start -->
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($documents))
                                @foreach ($documents as $row)
                                <tr>
                                    <td>{{ $row->id ?? "Not Given" }}</td>
                                    <td>{{ $row->name ?? 'Not Given' }}</td>
                                    <td>
                                        <img src="{{ asset('public/customer_documents') }}/{{ $row->images ?? 'no_image.png' }}" style="width: 40px; height:40px" alt="">
                                    </td>
                                    <th>
                                        <a href="{{ route('customer.document.view',$row->id) }}" class="btn btn-sm btn-success">View</a>
                                        <a href="{{ route('customer.document.edit',$row->id) }}" class="btn btn-sm btn-info"> Edit</a>
                                        <a href="{{ route('customer.document.delete',$row->id) }}" class="btn btn-sm btn-danger">Delete</a>

                                    </td>
                                </tr>
                                @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- datatable end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

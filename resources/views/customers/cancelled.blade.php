@extends('layouts.layout')


@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Manage  <span class="fw-300"><i>Franchises</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th>Register No</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Plot</th>
                                <th>Block</th>
                                <th>MobileNo</th>
                                <th>Instaments</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($customer))
                                @foreach ($customer as $row)
                                <tr>
                                    {{-- @foreach ($row->bookings as $brow) --}}
                                    <td>{{ $row->booking->id ?? '000' }}</td>
                                    {{-- @endforeach --}}
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    {{-- @foreach ($row->bookings as $brow) --}}
                                    <td>{{ $row->booking->plot->name ?? "Not Given" }}</td>
                                    <td>{{ $row->booking->plot->block->name ?? 'Not Given' }}</td>
                                    {{-- @endforeach --}}
                                    <td>{{ $row->mobile_no }}</td>
                                    <td><a href="{{ route('installment.show',$row->id) }}" class="btn btn-primary btn-sm">View</a></td>
                                    <th>
                                        {{-- <a href="{{ route('customer.show_details',$row->id) }}" class="btn btn-sm btn-info"> Edit Customer</a> --}}
                                        {{-- <a href="{{ route('admin.view.customer.delete',$row->id) }}" class="btn btn-sm btn-danger">Cancel File</a> --}}
                                        {{-- <a href="{{ route('admin.nominee_details_show',$row->id) }}" class="btn btn-sm btn-primary ml-2">Edit Nominee</a> --}}
                                        <a href="{{ route('admin.view.customer.form',$row->id) }}" class="btn btn-sm btn-primary ml-2">View Form</a>
                                    
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Customer ID</th>
                                <th>Register No</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Plot</th>
                                <th>MobileNo</th>
                                <th>Instaments</th>
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
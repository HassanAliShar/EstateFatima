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
                                <th>Franchise Name</th>
                                <th>Agent Name</th>
                                <th>Total Amount</th>
                                <th>Payable Amount</th>
                                <th>Agent Commission</th>
                                <th>Remaining Amount</th>
                                <th>Payment Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($franchise_payments))
                                @foreach ($franchise_payments as $row)
                                <tr>
                                    <td>{{ $row->franchise->name ?? 'Not Given' }}</td>
                                    <td>{{ $row->franchise->user->name ?? 'Not Given' }}</td>
                                    <td>{{ $row->total_amount ?? 0 }}</td>
                                    <td>{{ $row->paid_amount ?? 0 }}</td>
                                    <td>{{ $row->commission ?? 0 }}</td>
                                    <td>{{ ($row->total_amount-$row->commission)-$row->paid_amount ?? 0 }}</td>
                                    <td>{{ $row->created_at ?? '' }}</td>
                                    <th>
                                        <a href="{{ route('franchise.payments.delete',$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        <a href="{{ route('franchise.payments.edit',$row->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('franchise.payments.history',[$row->franchise->user->id,$row->franchise->id,$row->created_at]) }}" class="btn btn-sm btn-primary">History</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Franchise Name</th>
                                <th>Agent Name</th>
                                <th>Total Amount</th>
                                <th>Payable Amount</th>
                                <th>Agent Commission</th>
                                <th>Payment Date</th>
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

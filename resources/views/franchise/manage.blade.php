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
                    <!-- datatable start -->
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th>Franchise No</th>
                                <th>Agent Name</th>
                                <th>Agnet Email</th>
                                <th>Agent Mobile No</th>
                                <th>Amount Percent</th>
                                <th>Agent Limit</th>
                                <th>Agent Total Amount</th>
                                <th>Agent Commision</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($users))
                                @foreach ($users as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->mobile_no }}</td>
                                    <td>{{ $row->franchise->percent ?? '0' }}%</td>
                                    <td>{{ $row->franchise->limit_amount ?? '0' }}</td>
                                    <td>{{ $row->franchise->total_amount ?? '0' }}</td>
                                    <td>{{ $row->franchise->total_amount * (($row->franchise->percent/100)) }}</td>
                                    <th>
                                        @if ($row->franchise->total_amount >= $row->franchise->limit_amount)
                                            <a href="{{ route('franchise.active',$row->franchise->id) }}" class="btn btn-sm btn-success">Paid</a>
                                        @endif
                                        <a href="{{ route('franchise.delete',$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        <a href="{{ route('franchise.edit',$row->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('franchise.payments',$row->franchise->id) }}" class="btn btn-sm btn-info">Payments</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Franchise No</th>
                                <th>Agent Name</th>
                                <th>Agnet Email</th>
                                <th>Agent Mobile No</th>
                                <th>Amount Percent</th>
                                <th>Agent Limit</th>
                                <th>Agent Total Amount</th>
                                <th>Agent Commision</th>
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

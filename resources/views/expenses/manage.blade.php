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
                                <th>No #</th>
                                <th>Created By</th>
                                <th>Franchise Name</th>
                                <th>Expanse</th>
                                <th>Amount</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($expanse))
                                @foreach ($expanse as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $franchise->name }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->amount }}</td>
                                    <td>{{ $row->details }}</td>
                                    <th>
                                        <a href="{{ route('expanse.delete',$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        <a href="{{ route('expanse.edit',$row->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
                                <th>Franchise Address</th>
                                <th>Agent CNIC</th>
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

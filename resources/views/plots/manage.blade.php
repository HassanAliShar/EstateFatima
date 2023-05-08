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
                                <th>Plot ID</th>
                                <th>Plot Name</th>
                                <th>Plot Block</th>
                                <th>Plot Type</th>
                                <th>Plot Size</th>
                                <th>Plot Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($plots))
                                @foreach ($plots as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name ?? 'Not Given' }}</td>
                                    <td>{{ $row->block->name ?? 'Not Given' }}</td>
                                    <td>{{ $row->block_type_id == 1 ? 'Commercial' : 'Residential' }}</td>
                                    <td>{{ $row->size }}</td>
                                    <td>{{ $row->total_price }}</td>
                                    <th>
                                        <a href="{{ route('plots.delete',$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        <a href="{{ route('plots.edit',$row->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Plot ID</th>
                                <th>Plot Name</th>
                                <th>Plot Block</th>
                                <th>Plot Type</th>
                                <th>Plot Size</th>
                                <th>Plot Price</th>
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

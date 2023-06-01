@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Manage  <span class="fw-300"><i>You Agents</i></span>
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
                                <th>Agent ID</th>
                                <th>Agent Name</th>
                                <th>Agent Percentage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($sub_agents))
                                @foreach ($sub_agents as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name ?? 'Not Given' }}</td>
                                    <td>{{ $row->percentage ?? '0' }} %</td>
                                    <th>
                                        <a href="{{ route('agent.subagent.delete',$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        @if($row->confirm_status != "Accepted")
                                            <a href="{{ route('agent.subagent.edit',$row->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Agent ID</th>
                                <th>Agent Name</th>
                                <th>Agent Percentage</th>
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

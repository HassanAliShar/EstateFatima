@extends('layouts.layout')


@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Current Month Default  <span class="fw-300"><i>Customers</i></span>
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
                                <th>Plot</th>
                                <th>Register No</th>
                                <th>Customer Name</th>
                                <th>Defaults Months</th>
                                <th>Last Payment</th>
                                <th>MobileNo</th>
                                <th>Instaments</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($customer))
                                @foreach ($customer as $row)
                                    @if(in_array($row->id,$customer_ids))
                                        <tr>
                                            <td>{{ $row->booking->plot->name }}</td>
                                            {{-- @foreach ($row->bookings as $brow) --}}
                                            <td>{{ $row->booking->id }}</td>
                                            {{-- @endforeach --}}
                                            <td>{{ $row->name }}</td>
                                            <td>{{ Carbon\Carbon::parse($row->last_payment)->diffInMonths(Carbon\Carbon::now())+1 }}
                                                <small class="text-muted">(Rs {{ (Carbon\Carbon::parse($row->last_payment)->diffInMonths(Carbon\Carbon::now())+1) * $row->booking->plot->ins_payment ?? 0 }})</small>
                                            </td>
                                            <td>{{ $row->last_payment ?? '' }}</td>
                                            {{-- @foreach ($row->bookings as $brow) --}}
                                            {{-- @endforeach --}}
                                            <td>{{ $row->mobile_no }}</td>
                                            <td><a href="{{ route('agent.installment.show',$row->id) }}" class="btn btn-primary btn-sm">View</a></td>
                                            <th>
                                                <a href="{{ route('agent.customer.show_details',$row->id) }}" class="btn btn-sm btn-info"> Profile</a>
                                                <a href="{{ route('agent.customer.delete',$row->id) }}" class="btn btn-sm btn-danger"> Cancel File</a>
                                                <a href="{{ route('agent.nominee_details_show',$row->id) }}" class="btn btn-sm btn-primary ml-2">Nominee</a></td>
                                                <a href="{{ route('admin.view.customer.form',$row->id) }}" class="btn btn-sm btn-primary ml-2">View Form</a>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Plot</th>
                                <th>Register No</th>
                                <th>Customer Name</th>
                                <th>Default Months</th>
                                <th>Last Payment</th>
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

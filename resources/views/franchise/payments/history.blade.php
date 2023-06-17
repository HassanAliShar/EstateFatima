@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Franchise  <span class="fw-300"><i>Payment History</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        @foreach($customers as $key => $item)
                            @if(!is_null($item->booking) || count($item->installments) > 0)
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Customer Name : {{ $item->name ?? 'Not Given' }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!is_null($item->booking))
                                                <tr>
                                                    <th colspan="2">Down Payment : {{ $item->booking->down_payment ?? '00' }}</th>
                                                    <th colspan="2">Downpayment Date : {{ $item->booking->created_at ?? '00' }}</th>
                                                </tr>
                                            @endif
                                            @foreach ($item->installments as $row)
                                                <tr>
                                                    <td>{{ $row->id }}</td>
                                                    <td>{{ $row->installment_amount }}</td>
                                                    <td>{{ $row->created_at }}</td>
                                                    <th>
                                                        <a href="/get_unique_invoice/{{ $row->id }}/{{ $item->id }}" class="btn btn-info btn-sm">View</a>
                                                        @if(is_null($item->deleted_at))
                                                            <a href="/installment/delete/{{ $row->id }}/{{ $item->id }}" class="btn btn-sm btn-danger">Delete</a>
                                                            <a href="{{ route('admin.edit_customer_installment',$row->id) }}" class="btn btn-sm btn-primary ml-2">Edit</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="panel-container show">
                <div class="panel-content">
                    @php
                        $total_agents = 0;
                    @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>Agent No</th>
                                        <th>Agent Name</th>
                                        <th>Agnet Percentage</th>
                                        <th>Agent Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($sub_agents))
                                        @foreach ($sub_agents as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->name ?? "Not Given" }}</td>
                                            <td>{{ $row->percentage ?? 0 }}%</td>
                                            <td>
                                                @php
                                                    $totals=0;
                                                @endphp
                                                @foreach ($row->installments as $inst)
                                                    @php
                                                        $totals +=$inst->sub_agent_comission;
                                                        $total_agents +=$inst->sub_agent_comission
                                                    @endphp
                                                @endforeach
                                                {{ $totals }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Agent No</th>
                                        <th>Agent Name</th>
                                        <th>Agnet Percentage</th>
                                        <th>Agent Amount</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <h2>Franchise Total Commission Rs {{ $lastPayment->commission ?? 0 }} </h2>
                        </div>
                        <div class="col-md-4">
                            <h2>Franchise Sub Agents Commission Rs {{ $total_agents }} </h2>
                        </div>
                        <div class="col-md-4">
                            <h2>Franchise Current Commission Rs {{ $lastPayment->commission - $total_agents }} </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@extends('layouts.layout');

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Add  <span class="fw-300"><i>Installment</i></span>
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
                        <div class="col-md-12 text-center">
                            @if (isset($success_message))
                                <p class="text-success">
                                    {{ $success_message }}
                                </p>
                            @endif
                            @if (isset($error_message))
                                <p class="text-dagner">
                                    {{ $error_message }}
                                </p>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <form method="post" action="{{ route('agent.update_customer.installment') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selectcust">Recipt No</label>
                                            <input type="text" class="form-control" readonly value="{{ $installment->id }}" name="id"/>
                                            <input type="hidden" class="hidden_boid" name="booking_order_id" value="{{ $installment->booking_order_id }}"/>
                                            <h5 class="show_bookingid text-info"></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amounts">Enter Amount</label>
                                            <input id="amounts" class="form-control" value="{{ $installment->installment_amount }}" type="number" name="ins_amount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amounts">Created Date/Time</label>
                                            <input class="form-control" readonly value="{{ $installment->created_at }}" type="text" name="created_at">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amounts">Installment Details</label>
                                            <input class="form-control" value="{{ $installment->installment_details ?? 'N/A' }}" type="text" name="ins_details">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary float-right">Update Installment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Edit  <span class="fw-300"><i>Franchise Payment</i></span>
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
                        <div class="col-md-12">
                            <div class="col-md-12 mb-3">
                                <hr/>
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
                            </div>
                            <form method="post" action="{{ route('franchise.payments.update') }}">
                                <div class="form-row mb-3">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $payment->id }}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Total Amount</label>
                                            <input type="number" required name="total_amount" class="form-control" placeholder="Total Amount" value="{{ $payment->total_amount }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Payable Amount</label>
                                            <input type="number" required name="payable_amount" class="form-control" placeholder="Payable Amount" value="{{ $payment->paid_amount }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="UserName">Agent Commission</label>
                                            <input type="number" name="agent_commission" class="form-control" value="{{ $payment->commission }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 ml-auto">
                                        <button type="submit" class="btn btn-primary btn-block mt-4">Update</button>
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


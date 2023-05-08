@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-6 col-xl-6">
        <a href="" title="View All Orders With Details">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        {{ $available_plots }}
                        <small class="m-0 l-h-n">Available Plots</small>
                    </h3>
                </div>
                <i class="fal fa-file position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-6">
        <div class="p-3 bg-primary-200 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500" style="white-space: nowrap;  overflow: hidden;text-overflow: ellipsis; ">
                    {{ $purchased_plots }}
                    <small class="m-0 l-h-n">Salled Plots</small>
                </h3>
            </div>
            <i class="fal fa-money-bill-wave position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
        </div>
    </div>
    <div class="col-6 col-xl-6">
        <a href="" title="View All Registered Customers">
            <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        {{ $total_price }}
                        <small class="m-0 l-h-n">Total Price</small>
                    </h3>
                </div>
                <i class="fal fa-users position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-6">
        <a href="" title="View All Registered Customers">
            <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        {{ $user->franchise->limit_amount - $user->franchise->total_amount }}
                        <small class="m-0 l-h-n">Remaining Limit</small>
                    </h3>
                </div>
                <i class="fal fa-users position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-6">
        <a href="" title="View All Registered Customers">
            <div class="p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        {{ $user->franchise->total_amount * (($user->franchise->percent/100)) }}
                        <small class="m-0 l-h-n">Total Commission</small>
                    </h3>
                </div>
                <i class="fal fa-users position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-6">
        <a href="" title="View All Registered Customers">
            <div class="p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        {{ $user->franchise->total_amount * (1-($user->franchise->percent/100)) }}
                        <small class="m-0 l-h-n">Payable Amount</small>
                    </h3>
                </div>
                <i class="fal fa-users position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
            </div>
        </a>
    </div>

</div>
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

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-6 col-xl-6">
        <a href="" title="View All Products">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h4 class="display-4 d-block l-h-n m-0 fw-500">
                       {{ $total_plots }}
                        <small class="m-0 l-h-n">Total Plots</small>
                    </h4>
                </div>
                <i class="fal fa-shopping-cart position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
            </div>
        </a>
    </div>
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
        <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500" style="white-space: nowrap;  overflow: hidden;text-overflow: ellipsis; ">
                    {{ $purchased_plots }}
                    <small class="m-0 l-h-n">Purchased Plots</small>
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
            <div class="p-3 bg-danger-200 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        {{ $total_expanses }}
                        <small class="m-0 l-h-n">Total Expanses</small>
                    </h3>
                </div>
                <i class="fal fa-users position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-6">
        <a href="" title="View All Registered Customers">
            <div class="p-3 bg-danger-200 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        {{ $total_franchises }}
                        <small class="m-0 l-h-n">Total Franchises</small>
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

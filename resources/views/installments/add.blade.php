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
                            <form method="post" action="{{ route('installment.add') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selectcust">Select Customer</label>
                                            <select class="form-control select2 customer_info" name="customer_id" required>
                                                <option>--Select Customer--</option>
                                                @if (isset($customer))
                                                    @foreach ($customer as $row)
                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <input type="hidden" class="hidden_boid" name="booking_order_id"/>
                                            <input type="hidden" class="hidden_bid" name="booking_id"/>
                                            <h5 class="show_bookingid text-info"></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amounts">Enter Amount</label>
                                            <input id="amounts" class="form-control" type="number" name="ins_amount">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="amounts">Installment Details</label>
                                            <input class="form-control" type="text" name="ins_details">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary float-right">Pay Intallment</button>
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
<script src="{{ asset('webtemp/js/jquery-3.6.0.min.js') }}"></script>
<script>
    $(document).ready(function(){

        // $('.select2').select2();
        $('.customer_info').change(function(event){
            var id = $('.customer_info').val();
            $.ajax({
                url:"/show/customer_info/"+id,
                type:'get',
                success:function(response){
                    console.log(response.booking);
                    // $(response.installments).each(function(i,v){
                        $('.hidden_boid').val(response.booking.booking_orders_id);
                        $('.hidden_bid').val(response.booking.id);
                        $('.show_bookingid').html("Customer Register No :"+response.booking.id);
                    // })
                }
            });
        });
    });
</script>

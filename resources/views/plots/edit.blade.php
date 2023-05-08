@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-table'></i>Update: <span class='fw-300'>Plot</span>
        </h1>
    </div>
    <div class="row">
        <form method="post" action="{{ route('plots.update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $plot->id }}">
            <div class="form-row">
                <div class="col-md-12">
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="blocks">Select Block</label>
                        <select class="form-control" onchange="getBlockNumbers(this.options[this.selectedIndex].getAttribute('data-start'),this.options[this.selectedIndex].getAttribute('data-end'))" id="blocks" name="block">
                            <option>--Select Block --</option>
                            @if (isset($blocks))
                                @foreach ($blocks as $row)
                                    @if($plot->block_id == $row->id)
                                        <option selected data-start="{{ $row->start }}" data-end="{{ $row->end }}" value="{{ $row->id }}">{{ $row->name }}</option>
                                    @else
                                        <option data-start="{{ $row->start }}" data-end="{{ $row->end }}" value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="plotname">Plot Name</label>
                        <input id="plotname" value="{{ $plot->name ?? 'Not Given' }}" class="form-control" type="text" name="name">
                        <p class="form-text text-danger plot_name_error">
                            
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="plottype">Select Type</label>
                        <select class="form-control" id="plottype" name="type">
                            <option>--Select Type --</option>
                            @if (isset($block_cat))
                                @foreach ($block_cat as $row)
                                    @if($plot->block_type_id == $row->id)
                                        <option selected value="{{ $row->id }}">{{ $row->name }}</option>
                                    @else                                    
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="plottype">Select Plot Size</label>
                        <select class="form-control" id="plottype" name="size">
                            <option>--Select Size --</option>
                            <option selected value="120 GHAZ">120 GHAZ</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="plottype">Total Price</label>
                        <input id="plotname" value="{{ $plot->total_price ?? 0 }}" class="form-control" type="number" name="total_price">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="plottype">Down Payment</label>
                        <input id="plotname" value="{{ $plot->down_payment ?? 0 }}" class="form-control" type="number" name="downpay">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="plottype">Installment Amount</label>
                        <input id="plotname" value="{{ $plot->ins_payment }}" class="form-control" type="number" name="installmentpay">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 ml-auto">
                    <button type="submit" id="savePlotbtn"  class="btn btn-primary btn-block mt-4">Save</button>
                </div>
            </div>
        </form>
        <div class="col-md-12">
            <hr/>
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
<script src="{{ asset('webtemp/js/jquery-3.6.0.min.js') }}"></script>
<script>
    var start = 0;
    var end = 0;
    function getBlockNumbers(startblock,endblock){
        start = startblock;
        end = endblock;
    }

    $(document).ready(function(){
        start = $('#blocks').options[this.selectedIndex].getAttribute('data-start')
        end = $('#blocks').options[this.selectedIndex].getAttribute('data-end')
    })

    function plotNumber(ele){
        if(ele.value == ''){
            $("#savePlotbtn").attr('disabled','');
        }
        var plot = parseInt(ele.value);
        if(plot < start || plot > end){
            $('.plot_name_error').text("Plot Number Should be Under "+start+' to '+end);
            ele.focus();
            $("#savePlotbtn").attr('disabled','');
        }
        else{
            $('.plot_name_error').text('');
            $("#savePlotbtn").removeAttr('disabled');
        }
    }
</script>
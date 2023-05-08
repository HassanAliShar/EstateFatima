@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-table'></i>Add: <span class='fw-300'>Customer</span>
        </h1>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
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
        <form method="post" action="{{ route('customer.store') }}" enctype="multipart/form-data">
            <div class="form-row">.
                <h5>Plots Info</h5>
            </div>
            <div class="form-row mb-3">
                @csrf
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserName">Select Block</label>
                        <select class="form-control select2 blocks_id" name="block">
                            <option>Select Block</option>
                            @if (isset($blocks))
                                @foreach ($blocks as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserName">Select Type</label>
                        <select class="form-control select2 block_cat" name="type">
                            <option>Select Plot</option>
                            @if (isset($block_cat))
                                @foreach ($block_cat as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div><div class="col-md-4">
                    <div class="form-group">
                        <label for="UserName">Select Plot</label>
                        <select class="form-control select2 plots" name="plot">
                            <option>Select Plot</option>
                            <option>Plot 1</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="UserName">Preferred Choices</label>
                        <select name="preferred_choices" class="form-control" required="">
                            <option value="" selected="">Select Preffered Choice</option>
                            <option value="Normal">Normal</option>
                            <option value="Corner">Corner</option>
                            <option value="Park Facing">Park Facing</option>
                            <option value="Main Road">Main Road</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="size text-center text-success pt-3"></h5>
                    <input type="hidden" value="{{ auth()->user()->id }}" name="created_by"/>
                    <input type="hidden" class="hidden_size" name="plot_size"/>
                    <h4 class="showtotal_price text-center text-success pt-0"></h5>
                    <input type="hidden" class="hidden_price" name="total_price"/>
                </div>
            </div>
            <hr/>
            <div class="form-row">.
                <h5>Customer Info</h5>
            </div>
            <div class="form-row mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserName">Name</label>
                        <input id="UserName" value="{{ old('name') }}" class="form-control" placeholder="Enter Name" type="text" name="name" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserEmail">Email</label>
                        <input id="UserEmail" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" type="text" name="email" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="MobileNumber">Mobile Number</label>
                        <input id="MobileNumber" value="{{ old('mobile_no') }}" required class="form-control" type="text" name="mobile_no" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserCnic">CNIC Number</label>
                        <input id="UserCnic" value="{{ old('cnic_no') }}" required class="form-control" type="text" name="cnic_no" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Phone</label>
                        <input id="UserAddress" value="{{ old('phone') }}" class="form-control" type="text" name="phone" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress"> Permanent Address</label>
                        <input id="UserAddress" value="{{ old('address') }}" class="form-control" type="text" name="address" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Postal Address</label>
                        <input id="UserAddress" value="{{ old('p_address') }}" class="form-control" type="text" name="p_address" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Passport</label>
                        <input id="UserAddress" value="{{ old('passport') }}" class="form-control" type="text" name="passport" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Select Image</label>
                        <input id="UserAddress" class="form-control" type="file" name="image" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Gander</label>
                        <select class="form-control" required name="gender">
                            <option>--Select Gende--</option>
                            @foreach (genders() as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Father/Husband</label>
                        <input id="UserAddress" required value="{{ old('gardion') }}" class="form-control" type="text" name="gardion" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Select Relation</label>
                        <select class="form-control" required name="relation">
                            <option>-- Select Relation</option>
                            <option>S/O</option>
                            <option>D/O</option>
                            <option>W/O</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-row">.
                <h5>Nominee Detail</h5>
            </div>
            <div class="form-row mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserName">Nominee Name</label>
                        <input id="UserName" required value="{{ old('n_name') }}" class="form-control" placeholder="Enter Name" type="text" name="n_name" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserEmail">Nominee Email</label>
                        <input id="UserEmail" value="{{ old('n_email') }}" class="form-control" placeholder="Enter Email" type="text" name="n_email" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="MobileNumber">Nominee Mobile Number</label>
                        <input id="MobileNumber" value="{{ old('n_mobile_no') }}" class="form-control" type="text" name="n_mobile_no" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserCnic">Nominee CNIC Number</label>
                        <input id="UserCnic" value="{{ old('n_cnic_no') }}" class="form-control" type="text" name="n_cnic_no" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Nominee Phone</label>
                        <input id="UserAddress" value="{{ old('n_phone') }}" class="form-control" type="text" name="n_phone" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Nominee Permanent Address</label>
                        <input id="UserAddress" value="{{ old('n_address') }}" class="form-control" type="text" name="n_address" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Nominee Postal Address</label>
                        <input id="UserAddress" value="{{ old('n_p_address') }}" class="form-control" type="text" name="n_p_address" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Nominee Passport</label>
                        <input id="UserAddress" value="{{ old('n_passport') }}" class="form-control" type="text" name="n_passport" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Nominee Image</label>
                        <input id="UserAddress" class="form-control" type="file" name="n_image" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Nominee Gander</label>
                        <select class="form-control" required name="n_gender">
                            @foreach (genders() as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        {{-- <input id="UserAddress" value="{{ old('n_gender') }}" class="form-control" type="text" name="n_gender" > --}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Nominee Father/Husband</label>
                        <input id="UserAddress" value="{{ old('n_gardion') }}" class="form-control" type="text" name="n_gardion" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="UserAddress">Nominee Select Relation</label>
                        <select class="form-control" name="n_relation">
                            @foreach (relations() as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-row">.
                <h5>Payment Info</h5>
            </div>
            <div class="form-row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="UserName">Down Payment</label>
                        <input id="UserName" required value="{{ old('d_payment') }}" class="form-control down_payment" placeholder="Enter Name" type="text" name="d_payment" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="UserEmail">Installment Amount</label>
                        <input id="UserEmail" required value="{{ old('installment') }}" class="form-control intallment" placeholder="Enter Email" type="text" name="installment" >
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 ml-auto">
                    <button type="submit" class="btn btn-primary btn-block mt-4">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
<script src="{{ asset('webtemp/js/jquery-3.6.0.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.block_cat').change(function(e){
            // e.prevetDefault();
            var block_id = $('.blocks_id').val();
            var block_type_id = $('.block_cat').val();
            var option = '<option>--Select Plot--</option>'
            if(block_id == ''){
                alert("Please select Block");
            }else{
                $.ajax({
                    url:"/plots/"+block_id+"/"+block_type_id,
                    type:'get',
                    success:function(resp){
                        console.log(resp);
                        $(resp).each(function(i,v){
                            option += '<option value="'+v.id+'">'+v.name+'</option>'
                        })
                        $('.plots').empty().append(option);
                    }
                });
            }
        });

        $('.plots').change(function(event){
            var id = $('.plots').val();
            $.ajax({
                url:"/get_plot/"+id,
                type:'get',
                success:function(response){
                    $('.hidden_size').val(response.size);
                    $('.hidden_price').val(response.total_price);
                   $('.showtotal_price').html("Total Price Rs :"+response.total_price);
                   $('.size').html("Plot Size: "+response.size);
                   $('.down_payment').val(response.down_payment);
                   $('.intallment').val(response.ins_payment)
                }
            });
        });
    });
</script>

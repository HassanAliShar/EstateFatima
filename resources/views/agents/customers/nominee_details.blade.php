@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Edit Nominee <span class="fw-300"><i>{{ $data->name }}</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
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
                            <form method="post" action="{{ route('agent.updaate_nominee') }}" enctype="multipart/form-data">
                                <div class="form-row">
                                    @csrf
                                    <div class="col-md-2 offset-md-5 shadow mt-2 mb-4 text-center">
                                        <img src="{{ asset('/public/customer_images/'.$customer_info->images) }}" style="height: 100px; width: 100px; border-radius: 50%;"/>
                                        <h4 class="pt-3"></h4>
                                    </div>
                                </div>
                                <div class="form-row">.
                                    <h5>Nominee Of {{ $data->name }}</h5>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-md-4 mb-3">
                                        <input type="hidden" name="id" value="{{ $customer_info->id }}" >
                                        <input type="hidden" name="customer_id" value="{{ $customer_info->customer_id }}" >
                                        <div class="form-group">
                                            <label for="UserName">Name</label>
                                            <input id="UserName" value="{{ $customer_info->name }}" class="form-control" placeholder="Enter Name" type="text" name="name" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="UserEmail">Email</label>
                                            <input id="UserEmail" value="{{ $customer_info->email }}" class="form-control" placeholder="Enter Email" type="text" name="email" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="MobileNumber">Mobile Number</label>
                                            <input id="MobileNumber" value="{{ $customer_info->mobile_no }}" data-inputmask="'mask': '9999-9999999'" class="form-control" type="text" name="mobile_no" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="UserCnic">CNIC Number</label>
                                            <input id="UserCnic" value="{{ $customer_info->cnic_no }}" class="form-control" type="text" name="cnic_no" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="UserAddress">Phone</label>
                                            <input id="UserAddress" value="{{ $customer_info->phone }}" class="form-control" type="text" name="phone" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="UserAddress"> Permanent Address</label>
                                            <input id="UserAddress" value="{{ $customer_info->perment_address }}" class="form-control" type="text" name="address" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="UserAddress">Postal Address</label>
                                            <input id="UserAddress" value="{{ $customer_info->postal_address }}" class="form-control" type="text" name="p_address" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="UserAddress">Passport</label>
                                            <input id="UserAddress" value="{{ $customer_info->passport }}" class="form-control" type="text" name="passport" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="UserAddress">Select Image</label>
                                            <input id="UserAddress" class="form-control" type="file" name="image" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="UserAddress">Gander</label>
                                            <select class="form-control" name="gender">
                                                <option>--Select Gende--</option>
                                                @foreach (genders() as $item)
                                                    @if ($customer_info->gender == $item)
                                                        <option value="{{ $item }}" selected>{{ $item }}</option>
                                                    @else
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="UserAddress">Father/Husband</label>
                                            <input id="UserAddress" value="{{ $customer_info->guardian }}" class="form-control" type="text" name="gardion" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="UserAddress">Select Relation</label>
                                            <select class="form-control" name="relation">
                                                <option>-- Select Relation</option>
                                                @foreach (relations() as $item)
                                                    @if($item == $customer_info->relation)
                                                        <option selected value="{{ $item }}">{{ $item }}</option>
                                                    @else
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-2 ml-auto">
                                        <button type="submit" class="btn btn-primary btn-block mt-4">Save Changes</button>
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

@extends('layouts.layout')
@section('content')
<div class="container">
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
        <form method="post" action="/update_profile/{{ auth()->user()->id }}">
            <div class="form-row">
                @csrf
                <div class="col-md-2 offset-md-5 shadow mt-2 mb-4 text-center">
                    <img src="{{ asset('Template/img/intro-bg.jpg') }}" style="height: 100px; width: 100px; border-radius: 50%;"/>
                    <h4 class="pt-3">{{ $user->name }}</h4>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="UserName">Name</label>
                        <input id="UserName" class="form-control" placeholder="Enter Name" type="text" name="name" value="{{ $user->name }}">
                        <span class="help-block">(Hassan)</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="UserEmail">Email</label>
                        <input id="UserEmail" class="form-control" placeholder="Enter Email" type="text" name="email" value="{{ $user->email }}">
                        <span class="help-block">(example@example.com)</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="MobileNumber">Number</label>
                        <input id="MobileNumber" class="form-control" type="text" name="mobile_no" value="{{ $user->mobile_no }}">
                        <span class="help-block">(03062882501)</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="UserAddress">Address</label>
                        <input id="UserAddress" class="form-control" type="text" name="address" value="{{ $user->address }}">
                        <span class="help-block">(Address)</span>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="UserCnic">CNIC Number</label>
                        <input id="UserCnic" class="form-control" type="text" name="cnic_no" value="{{ $user->cnic_no }}">
                        <span class="help-block">(00000-0000000-0)
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block mt-4">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

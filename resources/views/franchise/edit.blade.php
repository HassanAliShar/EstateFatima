@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Edit  <span class="fw-300"><i>Franchise</i></span>
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
                            <h4>Owner Info </h4>
                            <hr/>
                            <form method="post" action="{{ route('franchise.update') }}">
                                <div class="form-row mb-3">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Owner Name</label>
                                            <input type="text" required name="name" class="form-control" placeholder="Name" value="{{ $user->name }}"/>
                                            <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Franchise Email</label>
                                            <input type="email" required name="email" class="form-control" placeholder="Email" value="{{ $user->email }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Owner Mobile No</label>
                                            <input type="text" maxlength="11" required name="mobile_no" class="form-control" placeholder="Mobile" value="{{ $user->mobile_no }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="UserName">Owner CNIC</label>
                                            <input type="number" name="cnic" class="form-control" maxlength="13" placeholder="4012045754820" value="{{ $user->cnic_no }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Franchise Info</h4>
                                        <hr/>
                                    </div>
                                    @foreach ($user->franchises as $row)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="UserName">Franchise Name</label>
                                                <input type="text" required name="f_name" class="form-control" placeholder="Franchise Name" value="{{ $row->name }}"/>
                                                <input type="hidden" name="f_id" value="{{ $row->id }}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="UserName">Franchise City</label>
                                                <input type="text" required name="f_city" class="form-control" placeholder="City" value="{{ $row->city }}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="UserName">Franchise Limit Amount</label>
                                                <input type="number" required name="f_limit" class="form-control" placeholder="Limit Amount" value="{{ $row->limit_amount }}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="UserName">Franchise Phone</label>
                                                <input type="number" name="f_phone" class="form-control" placeholder="Phone" value="{{ $row->phone }}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="UserName">Address</label>
                                                <textarea name="address" rows="6" class="form-control">{{ $row->address }}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
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


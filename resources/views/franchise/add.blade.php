@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Add  <span class="fw-300"><i>Franchise</i></span>
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
                            <h4>Owner Info </h4>
                            <hr/>
                            <form method="post" action="{{ route('franchise.store') }}">
                                <div class="form-row mb-3">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Owner Name</label>
                                            <input type="text" value="{{ old('name') }}" required name="name" class="form-control" placeholder="Name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Franchise Email</label>
                                            <input type="email" value="{{ old('email') }}" required name="email" class="form-control" placeholder="Email"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Owner Mobile No</label>
                                            <input type="text" value="{{ old('mobile_no') }}" maxlength="11" required name="mobile_no" class="form-control" placeholder="Mobile"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Password</label>
                                            <input type="password" value="{{ old('password') }}" required name="password" class="form-control" placeholder="password"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="UserName">Owner CNIC</label>
                                            <input type="number" value="{{ old('cnic') }}" name="cnic" class="form-control" maxlength="13" placeholder="4012045754820"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="UserName">Amount Percentage</label>
                                            <input type="number" value="{{ old('percent') }}" name="percent" class="form-control" maxlength="3" placeholder="000"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Franchise Info</h4>
                                        <hr/>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Franchise Name</label>
                                            <input type="text" value="{{ old('f_name') }}" required name="f_name" class="form-control" placeholder="Franchise Name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Franchise City</label>
                                            <input type="text" value="{{ old('f_city') }}" required name="f_city" class="form-control" placeholder="City"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Franchise Limit Amount</label>
                                            <input type="number" value="{{ old('f_limit') }}" required name="f_limit" class="form-control" placeholder="Limit Amount"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Franchise Phone</label>
                                            <input type="number" value="{{ old('f_phone') }}" name="f_phone" class="form-control" placeholder="Phone"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="UserName">Address</label>
                                            <textarea name="address" value="{{ old('address') }}" rows="6" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 ml-auto">
                                        <button type="submit" class="btn btn-primary btn-block mt-4">Save</button>
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


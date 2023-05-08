@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-table'></i>Edit: <span class='fw-300'>Block</span>
        </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('block.store') }}">
                @csrf
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="blockname">Enter Block Name</label>
                            <input id="blockname" class="form-control" value="{{ old('name') }}" type="text" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="blockname">Block Plot Number Start?</label>
                            <input id="blockname" class="form-control" value="{{ old('start') }}" type="text" name="start">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="blockname">Block Plot Number End?</label>
                            <input id="blockname" class="form-control" value="{{ old('end') }}" type="text" name="end">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 ml-auto">
                        <button type="submit" class="btn btn-primary btn-block mt-4">Save Block</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

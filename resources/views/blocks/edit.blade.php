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
            <form method="post" action="{{ route('block.update') }}">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">

                        <input type="hidden" name="id" value="{{ $block->id }}"/>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="blockname">Block Name</label>
                                    <input id="blockname" class="form-control" type="text" name="name" value="{{ $block->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="blockname">Block Plot Number Start?</label>
                                    <input id="blockname" value="{{ $block->start ?? 0 }}" class="form-control" value="{{ old('start') }}" type="text" name="start">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="blockname">Block Plot Number End?</label>
                                    <input id="blockname" value="{{ $block->end ?? 0 }}" class="form-control" value="{{ old('end') }}" type="text" name="end">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 ml-auto">
                        <button type="submit" class="btn btn-primary btn-block mt-4">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
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
    </div>
</div>

@endsection

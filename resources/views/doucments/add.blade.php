@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-table'></i>Add: <span class='fw-300'>New Document</span>
        </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('customer.document.store',$id) }}" enctype="multipart/form-data">
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
                            <label for="docname">Enter Document Name</label>
                            <input id="docname" class="form-control" value="{{ old('docname') }}" type="text" name="docname">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="docimage">Select Image</label>
                            <input id="docimage" accept=".png, .jpg, .jpeg, .gif, .jfif" class="form-control" type="file" name="image" >
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 ml-auto">
                        <button type="submit" class="btn btn-primary btn-block mt-4">Save Documents</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

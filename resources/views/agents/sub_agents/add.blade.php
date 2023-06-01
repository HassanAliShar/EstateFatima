@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-table'></i>Add: <span class='fw-300'>You Agent</span>
        </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('agent.subagent.store') }}">
                @csrf
                <div class="row">
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
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="plotname">Agent Name</label>
                            <input id="plotname" value="{{ old('name') }}" onchange="plotNumber(this)" class="form-control" type="text" name="name">
                            <p class="form-text text-danger plot_name_error">

                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <div class="form-group">
                            <label for="plottype">Agent Commsion</label>
                            <input id="percantage" value="{{ old('perentage') }}" class="form-control" type="number" name="percentage">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 ml-auto">
                        <button type="submit" id="saveSubAgentbtn" class="btn btn-primary btn-block mt-4">Save</button>
                    </div>
                </div>
            </form>
        </div>
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

</script>

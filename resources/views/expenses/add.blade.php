@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Add Franchise<span class="fw-300"><i>Expanse</i></span>
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
                            <form method="post" action="{{ route('expanse.store') }}">
                                <div class="form-row mb-3">
                                    @csrf
                                    <input type="hidden" name="user_id" value="4"/>
                                    <input type="hidden" name="f_id" value="2"/>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Expanse Name</label>
                                            <input type="text" required name="name" class="form-control" placeholder="Expanse"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Expanse Amount</label>
                                            <input type="number" required name="amount" class="form-control" placeholder="amount"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="UserName">Expanse Details</label>
                                            <textarea name="details" rows="6" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 ml-auto">
                                        <button type="submit" class="btn btn-primary btn-block mt-4">Save Expanse</button>
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


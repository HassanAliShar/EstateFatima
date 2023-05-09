
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('include.head')
</head>
<body>
    <div class="container">
        <div class="row justify-content-center item-align-center">
            <div class="col-md-6">
                <div class="card" style="top: 50%;">
                    <div class="card-header fw-900 bg-dark text-light">User Plot & Installment Info</div>
    
                    <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-danger">
                                {{ Session::get('success') }}
                            </p>
                        @endif
                        @if(Session::has('error'))
                            <p class="text-danger">
                                {{ Session::get('error') }}
                            </p>
                        @endif
                        <form method="POST" action="{{ route('search.user.info') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="email" class="col-form-label text-md-end">Enter Computrized File No <span class="text-danger">*</span></label>
                                <input id="email" type="number" placeholder="Enter Computrized File No 111" class="form-control" name="file_no" value="{{ old('file_no') }}" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-form-label text-md-end">Enter Customer Mobile No <span class="text-danger">*</span></label>
                                <input id="password" data-inputmask="'mask': '9999-9999999'" type="text" placeholder="Enter Customer Mobile No" class="form-control @error('password') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-dark btn-block">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('include.footer_js')
</body>
</html>

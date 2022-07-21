@extends('web')

@section('content')  
<div class="mt-5 mb-5 d-flex align-items-center auth">
    <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5 box-sh">
                <div class="brand-logo">
                    <img alt="MyNovelHub Logo" src="{{ url('images/logo.png') }}">
                </div>
                <h4>Reset Password</h4>
                <h6 class="font-weight-light">Enter your email.</h6>
                <form class="form-sample" enctype="multipart/form-data" action="{{ url('/forgot-password') }}"
                method="POST">
                @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1"
                            placeholder="Email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="mt-3 mb-2">
                        <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                            Send Link
                        </button>
                    </div>
                    
                    <div class="mb-2">
                        <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                            <i class="mdi mdi-facebook mr-2"></i>
                            Connect using facebook 
                        </button>
                    </div>
                    <div class="text-center mt-4 font-weight-light"> Don't have an account? 
                        <a href="{{ url('register') }}" class="text-primary">Create</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection    

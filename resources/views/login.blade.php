@extends('web')

@section('content')  
<div class="mt-5 mb-5 d-flex align-items-center auth">
    <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5 box-sh">
                <div class="brand-logo">
                    <img alt="MyNovelHub Logo" src="{{ url('images/logo.png') }}">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="form-sample" enctype="multipart/form-data" action="{{ url('user_login') }}"
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
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            id="exampleInputPassword1" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <label class="form-check-label text-muted">
                                <input type="checkbox" class="form-check-input"> 
                                    {{ __('Keep me signed in') }} 
                                <i class="input-helper"></i>
                            </label>
                        </div>
                        <a href="{{ url('forgot-password') }}" class="auth-link text-black">{{ __('Forgot password?') }}</a>
                    </div>
                    <div class="mb-2">
                        <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                            <i class="mdi mdi-facebook mr-2"></i>
                            {{ __('Connect using facebook') }}
                        </button>
                    </div>
                    <div class="text-center mt-4 font-weight-light"> 
                        {{ __("Don't have an account?") }} 
                        <a href="{{ url('register') }}" class="text-primary">
                            {{ __('Create') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection    

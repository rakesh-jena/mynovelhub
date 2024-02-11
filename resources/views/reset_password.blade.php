@extends('web')

@section('content')  
<div class="mt-5 mb-5 d-flex align-items-center auth">
    <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5 box-sh">
                <div class="brand-logo">
                    <img alt="MyNovelHub Logo" src="{{ url('images/logo.png') }}">
                </div>
                <h4>{{ __('Reset Password') }}</h4>
                <h6 class="font-weight-light">{{ __('Enter New Password') }}</h6>
                <form class="form-sample" enctype="multipart/form-data" action="{{ route('password.update') }}"
                method="POST">
                @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
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
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required
                        placeholder="Confirm Password">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection    

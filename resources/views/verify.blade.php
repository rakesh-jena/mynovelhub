@extends('web')

@section('content')  
<div class="mt-5 mb-5 d-flex align-items-center auth">
    <div class="row flex-grow">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Verify Your Email Address') }}</h5>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    

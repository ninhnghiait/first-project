@extends('layouts.master-auth')

@section('section-main', 'body-sign')    
@section('main')    
<div class="panel panel-sign">
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>{{ __('Verify Your Email Address') }}</h2>
    </div>
    <div class="panel-body">
        @if (session('resent'))
        <div class="alert alert-info">
            <p class="m-none text-semibold h6">{{ __('A fresh verification link has been sent to your email address.') }}</p>
        </div>
        @endif
        <p class="text-center mt-lg">{{ __('Before proceeding, please check your email for a verification link.') }}</a>
        <p class="text-center mt-lg">{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>
    </div>
</div>
@endsection

@extends('layouts.master-auth')

@section('section-main', 'body-sign')    
@section('main')    
<div class="panel panel-sign">
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>{{ __('Reset Password') }}</h2>
    </div>
    <div class="panel-body">
        @if (session('status'))
        <div class="alert alert-info">
            <p class="m-none text-semibold h6">{{ session('status') }}</p>
        </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group mb-none{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group">
                    <input name="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control input-lg" value="{{ old('email') }}" required />
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-lg" type="submit">{{ __('Send Password Reset Link') }}</button>
                    </span>
                </div>
                @if ($errors->has('email'))
                <label for="email" class="error">{{ $errors->first('email') }}</label>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection

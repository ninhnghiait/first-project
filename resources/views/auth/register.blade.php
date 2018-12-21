@extends('layouts.master-auth')

@section('section-main', 'body-sign')    
@section('main')    
<div class="panel panel-sign">
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> {{ __('Register') }}</h2>
    </div>
    <div class="panel-body">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group mb-lg{{ $errors->has('name') ? ' has-error' : '' }}">
                <label>{{ __('Name') }}</label>
                <input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}" required autofocus  />
                @if ($errors->has('name'))
                <label for="name" class="error">{{ $errors->first('name') }}</label>
                @endif
            </div>
            <div class="form-group mb-lg{{ $errors->has('email') ? ' has-error' : '' }}">
                <label>{{ __('E-Mail Address') }}</label>
                <input name="email" type="email" class="form-control input-lg" value="{{ old('email') }}" required />
                @if ($errors->has('email'))
                <label for="email" class="error">{{ $errors->first('email') }}</label>
                @endif
            </div>

            <div class="form-group mb-none{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="row">
                    <div class="col-sm-6 mb-lg">
                        <label>{{ __('Password') }}</label>
                        <input name="password" id="password" type="password" class="form-control input-lg" />
                        @if ($errors->has('password'))
                        <label for="password" class="error">{{ $errors->first('password') }}</label>
                        @endif
                    </div>
                    <div class="col-sm-6 mb-lg">
                        <label>{{ __('Confirm Password') }}</label>
                        <input name="password_confirmation" id="password-confirm" type="password" class="form-control input-lg" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4 text-right">
                    <button type="submit" class="btn btn-primary hidden-xs">{{ __('Register') }}</button>
                    <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">{{ __('Register') }}</button>
                </div>
            </div>

            <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                <span>or</span>
            </span>

            <div class="mb-xs text-center">
                <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
                <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
            </div>

            <p class="text-center">{{ __('Already have an account?') }} <a href="{{ route('login') }}">{{ __('Login') }}</a>

        </form>
    </div>
</div>
@endsection

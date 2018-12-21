@extends('layouts.master-auth')

@section('section-main', 'body-sign')    
@section('main')    
<div class="panel panel-sign">
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> {{ __('Login') }}</h2>
    </div>
    <div class="panel-body">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group mb-lg{{ $errors->has('email') ? ' has-error' : '' }}">
                <label>{{ __('E-Mail Address') }}</label>
                <div class="input-group input-group-icon">
                    <input id="email" name="email" type="email" class="form-control input-lg" value="{{ old('email') }}"  required autofocus />
                    <span class="input-group-addon">
                        <span class="icon icon-lg">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </span>
                </div>
                @if ($errors->has('email'))
                <label for="email" class="error">{{ $errors->first('email') }}</label>
                @endif
            </div>

            <div class="form-group mb-lg{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="clearfix">
                    <label class="pull-left">{{ __('Password') }}</label>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="pull-right">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </div>
                <div class="input-group input-group-icon">
                    <input name="password" type="password" class="form-control input-lg" />
                    <span class="input-group-addon">
                        <span class="icon icon-lg">
                            <i class="fa fa-lock"></i>
                        </span>
                    </span>
                </div>
                @if ($errors->has('password'))
                <label for="password" class="error">{{ $errors->first('password') }}</label>
                @endif
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="checkbox-custom checkbox-default">
                        <input id="RememberMe" name="rememberme" type="checkbox" {{ old('remember') ? 'checked' : '' }} />
                        <label for="RememberMe">{{ __('Remember Me') }}</label>
                    </div>
                </div>
                <div class="col-sm-4 text-right">
                    <button type="submit" class="btn btn-primary hidden-xs">{{ __('Login') }}</button>
                    <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">{{ __('Login') }}</button>
                </div>
            </div>

            <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                <span>or</span>
            </span>

            <div class="mb-xs text-center">
                <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
                <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
            </div>

            <p class="text-center">{{ __('Don\'t have an account yet?') }} <a href="{{ route('register') }}">{{ __('Register') }}!</a>

        </form>
    </div>
</div>
@endsection

@extends('layouts.master-auth')

@section('section-main', 'body-sign')    
@section('main')    
<div class="panel panel-sign">
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> {{ __('Reset Password') }}</h2>
    </div>
    <div class="panel-body">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group mb-lg{{ $errors->has('email') ? ' has-error' : '' }}">
                <label>{{ __('E-Mail Address') }}</label>
                <div class="input-group input-group-icon">
                    <input id="email" name="email" type="email" class="form-control input-lg" value="{{ old('email') }}"  required autofocus />
                    <span class="input-group-addon">
                        <span class="icon icon-lg">
                            <i class="fa fa-envelop"></i>
                        </span>
                    </span>
                </div>
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
                    <button type="submit" class="btn btn-primary hidden-xs">{{ __('Reset Password') }}</button>
                    <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">{{ __('Reset Password') }}</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

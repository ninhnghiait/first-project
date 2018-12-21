@extends('layouts.master')
@section('main')    
<section role="main" class="content-body">
    @component('components.admin.header-main', ['title' => __('header_title.create_new_user')])
        @slot('ol')
            <li><span>{{ __('header_title.platform_administration') }}</span></li>
            <li><a href="{{ route('adusers.index') }}"><span>{{ __('header_title.user_management') }}</span></a></li>
            <li><span>{{ __('header_title.create_new_user') }}</span></li>
        @endslot
    @endcomponent
    
    <!-- start: page -->
    <div class="row">
        <div class="col-lg-9">
            <section class="panel">
                <div class="panel-body">
                    <form action="{{ route('adusers.store') }}" class="form-horizontal form-bordered" method="POST" id="form" novalidate>
                        @csrf
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="first_name">{{ __('user.first_name') }} <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="first_name" class="form-control" id="first_name"
                                    value="{{ old('first_name') }}" required
                                    data-validation="length" data-validation-length="max100" >
                                @if ($errors->has('first_name'))
                                <label for="first_name" class="error">{{ $errors->first('first_name') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="last_name">{{ __('user.last_name') }} <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="last_name" class="form-control" id="last_name" max="50" value="{{ old('last_name') }}" required
                                    data-validation="length" data-validation-length="max100" >
                                @if ($errors->has('last_name'))
                                <label for="last_name" class="error">{{ $errors->first('last_name') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="name">{{ __('user.username') }} <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" id="name" max="50" value="{{ old('username') }}" required
                                    data-validation="length" data-validation-length="5-100" >
                                @if ($errors->has('username'))
                                <label for="name" class="error">{{ $errors->first('username') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="password">{{ __('user.password') }} <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control" id="password" max="50" required>
                                @if ($errors->has('password'))
                                <label for="password" class="error">{{ $errors->first('password') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="email">Email <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" id="email" max="50" required value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <label for="email" class="error">{{ $errors->first('email') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="roles">{{ __('user.role') }} <span class="required">*</span></label>
                            <div class="col-md-6">
                                <select name="roles[]" class="form-control" required multiple size="{{ $roles->count() }}">
                                    @foreach ($roles as $r)
                                    <option value="{{ $r->id }}">{{ $r->display_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('email'))
                                <label for="roles" class="error">{{ $errors->first('roles') }}</label>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class="panel">
                <div class="panel-body">
                    <h4>{{ __('action.action') }}</h4>
                    <button type="submit" name="save" value="save" form="form" class="btn btn-info mb-5"><i class="fa fa-save"></i> {{ __('action.save') }} </button>
                    <button type="submit" name="save" value="save-edit" form="form" class="btn btn-success mb-5"><i class="fa fa-check-circle"></i> {{ __('action.save_edit') }}</button>
                    <a href="{{session('routejt') ?: url()->previous()}}" class="btn btn-primary mb-5"><i class="fa fa-backward"></i> {{ __('action.back') }}</a>
                </div>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>
@endsection
@section('footer') 
<script src="{{ asset('admin/assets/jquery-form-validator/form-validator/jquery.form-validator.min.js') }}"></script>
<script>
  $.validate({
    modules : 'html5',
    lang : '{{ session('locale') }}'
  });
</script>
@endsection
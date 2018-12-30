@extends('layouts.master')
@section('main')    
<section role="main" class="content-body">
    @component('components.admin.header-main', ['title' => __('header_title.create_role')])
        @slot('ol')
            <li><span>{{ __('header_title.platform_administration') }}</span></li>
            <li><a href="{{ route('adroles.store') }}"><span>{{ __('header_title.role_management') }}</span></a></li>
            <li><span>{{ __('header_title.create_role') }}</span></li>
        @endslot
    @endcomponent

    @if (session('msg'))
        @component('components.admin.alert', ['type' => 'success', 'title' => session('msg')])
        @endcomponent
    @endif

    @if (session('msger'))
        @component('components.admin.alert', ['type' => 'error', 'title' => session('msger')])
        @endcomponent
    @endif

    <!-- start: page -->
    <div class="row">
        <div class="col-lg-9">
            <section class="panel">
                <div class="panel-body">
                    <form action="{{ route('adroles.store') }}" class="form-horizontal form-bordered" method="POST" id="form" novalidate>
                        @csrf
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="name">{{ __('permission.name') }}<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required data-validation="length" data-validation-length="max100">
                                @if ($errors->has('name'))
                                <label for="name" class="error">{{ $errors->first('name') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="display_name">{{ __('permission.display_name') }}</label>
                            <div class="col-md-9">
                                <input type="text" name="display_name" id="display_name" class="form-control" data-validation="length" data-validation-length="max100" value="{{ old('display_name') }}" >
                                @if ($errors->has('display_name'))
                                <label for="display_name" class="error">{{ $errors->first('display_name') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="permisions">{{ __('permission.permission') }}</label>
                            <div class="col-md-9">
                                @php
                                    $oldPermissions = old('permisions', []);
                                @endphp
                                @foreach ($permissions as $p)
                                <div class="checkbox-custom checkbox-default col-md-6">
                                    <input name="permisions[]" type="checkbox" id="permisions_{{ $p->id }}" value="{{ $p->id }}" {{ in_array($p->id, $oldPermissions) ? 'checked' : '' }}>
                                    <label for="permisions_{{ $p->id }}">{{ $p->display_name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="description">{{ __('permission.description') }} </label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description" rows="3" data-validation="length" data-validation-length="max150">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                <label for="description" class="error">{{ $errors->first('description') }}</label>
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

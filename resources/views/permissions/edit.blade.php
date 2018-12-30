@extends('layouts.master')
@section('header')
<style>
    .mb-5 {margin-bottom: 5px;}
</style>
@endsection
@section('main')    
<section role="main" class="content-body">
    @component('components.admin.header-main', ['title' => __('header_title.edit_permission')])
        @slot('ol')
            <li><span>{{ __('header_title.platform_administration') }}</span></li>
            <li><a href="{{ route('adpermissions.index') }}"><span>{{ __('header_title.permission_management') }}</span></a></li>
            <li><span>{{ __('header_title.edit_permission') }}</span></li>
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
                    <form action="{{ route('adpermissions.update', $item->id) }}" class="form-horizontal form-bordered" method="POST" id="form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">{{ __('permission.name') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" value="{{ $item->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="display_name">{{ __('permission.display_name') }} <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="display_name" class="form-control" id="display_name" data-validation="length" data-validation-length="max100" value="{{ old('display_name', $item->display_name) }}" >
                                @if ($errors->has('display_name'))
                                <label for="display_name" class="error">{{ $errors->first('display_name') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="description">{{ __('permission.description') }} </label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="description" id="description" rows="3" data-validation="length" data-validation-length="max150">{{ old('description', $item->description) }}</textarea>
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
                    {{-- <button type="reset" form="form" class="btn btn-default mb-5"><i class="fa fa-power-off"></i> {{ __('action.reset') }}</button> --}}
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

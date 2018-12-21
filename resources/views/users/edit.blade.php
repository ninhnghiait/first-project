@extends('layouts.master')
@section('main')    
<section role="main" class="content-body">
    @component('components.admin.header-main', ['title' => __('header_title.edit_user')])
        @slot('ol')
            <li><span>{{ __('header_title.platform_administration') }}</span></li>
            <li><a href="{{ route('adusers.index') }}"><span>{{ __('header_title.user_management') }}</span></a></li>
            <li><span>{{ __('header_title.edit_user') }}</span></li>
        @endslot
    @endcomponent
    
    @php
        $id = $item->id;
        $name = $item->name;
        $firstName = $item->first_name;
        $lastName = $item->last_name;
        $email = $item->email;
        $avatarUser = $item->avatar_user;
        $avatarUrl = $avatarUser;
        $active = $item->active;
        $fullname = $item->fullname;

        $profile = $item->profile;
        if (!is_null($profile)) {
            $job = $profile->job;
            $secondaryEmail = $profile->secondary_email;
            $address = $profile->address;
            $secondaryAddress = $profile->secondary_address;
            $birthday = $profile->birthday->format('d-m-Y');
            $gender = $profile->gender;
            $about = $profile->about;
            $facebook = $profile->facebook;
            $googlePlus = $profile->google_plus;
            $twitter = $profile->twitter;
            $skype = $profile->skype;
            $website = $profile->website;
            $countryCode = $profile->country_code;
            $phoneNumber = $profile->phone_number;
        } else {
            $job = null; $secondaryEmail = null; $address = null; $secondaryAddress = null; $birthday = null; $gender = null; $about = null; $facebook = null; $googlePlus = null; $twitter = null; $skype = null; $website = null; $countryCode = 'VN'; $phoneNumber = null;
        }
        $rolecr = $item->roles()->pluck('role_id')->toArray();
    @endphp
    <!-- start: page -->
    <div class="row">
        <div class="col-lg-3">
            <section class="panel">
                <div class="panel-body">
                    <div class="thumb-info mb-md"> 
                        <a href="javascript:;" onclick="$('#avatar-input').click()"><img src="{{ $avatarUrl }}" class="rounded img-responsive" alt="John Doe" id="avatar"></a>
                        <div class="thumb-info-title" style="background: none">
                            <span class="thumb-info-inner" style="font-size: 14px;color: #0088cc;">{{ $fullname }}</span>
                            <span class="thumb-info-type" style="background-color: #cccccc; color: #34495d">{{ $job }}</span>
                        </div>
                    </div>
                    <h4>{{ __('action.action') }}</h4>
                    <button type="submit" name="save" value="save" form="form" class="btn btn-info mb-5"><i class="fa fa-save"></i> {{ __('action.save') }} </button>
                    <button type="submit" name="save" value="save-edit" form="form" class="btn btn-success mb-5"><i class="fa fa-check-circle"></i> {{ __('action.save_edit') }}</button>
                    <a href="{{session('routejt') ?: url()->previous()}}" class="btn btn-primary mb-5"><i class="fa fa-backward"></i> {{ __('action.back') }}</a>
                </div>
            </section>
        </div>
        <div class="col-lg-9">
            <section class="panel">
                <div class="panel-body">
                    <form action="{{ route('adusers.update', $id) }}" class="form-horizontal form-bordered" method="POST" id="form" role="form" novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="first_name">{{ __('user.first_name') }} <span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ old('first_name', $firstName) }}"
                                    data-validation="required,length" data-validation-length="max100" >
                                @if ($errors->has('first_name'))
                                <label for="first_name" class="error">{{ $errors->first('first_name') }}</label>
                                @endif
                            </div>

                            <label class="col-md-2 control-label" for="last_name">{{ __('user.last_name') }} <span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="text" name="last_name" class="form-control"
                                    value="{{ old('first_name', $lastName) }}"
                                    data-validation="required,length" data-validation-length="max100" >
                                @if ($errors->has('last_name'))
                                <label for="last_name" class="error">{{ $errors->first('last_name') }}</label>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">{{ __('user.username') }} <span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $name) }}"
                                    data-validation="required,length" data-validation-length="5-100">
                                @if ($errors->has('name'))
                                <label for="name" class="error">{{ $errors->first('name') }}</label>
                                @endif
                            </div>

                            <label class="col-md-2 control-label" for="gender">{{ __('user.gender') }}</label>
                            <div class="col-md-4">
                                <select name="gender" class="form-control">
                                    <option value="1">{{ __('user.male') }}</option>
                                    <option value="0" {{ old('gender', $gender) == 0 ? 'selected' : '' }}>{{ __('user.female') }}</option>
                                </select>
                                @if ($errors->has('gender'))
                                <label for="gender" class="error">{{ $errors->first('gender') }}</label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="password">{{ __('user.password') }}</label>
                            <div class="col-md-4">
                                <input type="password" id="password" name="password" class="form-control">
                                @if ($errors->has('password'))
                                <label for="password" class="error">{{ $errors->first('password') }}</label>
                                @endif
                            </div>

                            <label class="col-md-2 control-label" for="password_confirmation">{{ __('user.password_confirmation') }}</label>
                            <div class="col-md-4">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label" for="">Email <span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="email" name="email" class="form-control" value="{{ old('email', $email) }}" required>
                                @if ($errors->has('email'))
                                <label for="email" class="error">{{ $errors->first('email') }}</label>
                                @endif
                            </div>

                            <label class="col-md-2 control-label" for="">{{ __('user.secondary_email') }}</label>
                            <div class="col-md-4">
                                <input type="email" name="secondary_email" class="form-control" value="{{ old('secondary_email', $secondaryEmail) }}">
                                @if ($errors->has('secondary_email'))
                                <label for="secondary_email" class="error">{{ $errors->first('secondary_email') }}</label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="">{{ __('user.role') }} <span class="required">*</span></label>
                            <div class="col-md-4">
                                <select name="roles[]" class="form-control" multiple size="{{ $roles->count() }}">
                                    @php
                                        $rolecr = old('roles', $rolecr);
                                    @endphp
                                    @foreach ($roles as $r)
                                    <option value="{{ $r->id }}" {{ in_array($r->id, $rolecr) ? 'selected' : '' }}>{{ $r->display_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('roles'))
                                <label for="roles" class="error">{{ $errors->first('roles') }}</label>
                                @endif
                            </div>
                            <label class="col-md-2 control-label" for="">{{ __('user.active') }}</label>
                            <div class="col-md-4">
                                <div class="checkbox-custom checkbox-info col-md-4">
                                    <input name="active" type="checkbox" value="1" {{ old('active', $active) == true ? 'checked' : '' }}>
                                    <label for=""></label>
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="avatar">{{ __('user.avatar') }}</label>
                            <div class="col-md-6 no-padding-right">
                                <input type="text" name="avatar" id="id_of_the_target_input"  class="form-control" value="{{ old('avatar', $avatarUser) }}"
                                    pattern="^(.+).jpg$|^(.+).jpge$|^(.+).png$|^(.+).gif$" 
                                    data-validation-error-msg=".jpg, .jpge, .png, .gif" />
                                @if ($errors->has('avatar'))
                                <label for="avatar" class="error">{{ $errors->first('avatar') }}</label>
                                @endif
                            </div>
                            <div class="col-md-4 no-padding-left">
                                <button class="btn btn-info" type="button" onclick="BrowseServer('id_of_the_target_input', 'avatar');">{{ __('user.upload_picture') }}</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="">{{ __('user.address') }}</label>
                            <div class="col-md-4">
                                <input type="text" name="address" class="form-control"
                                    value="{{ old('address', $address) }}"
                                    data-validation="length" data-validation-length="0-100" >
                                @if ($errors->has('address'))
                                <label for="address" class="error">{{ $errors->first('address') }}</label>
                                @endif
                            </div>

                            <label class="col-md-2 control-label" for="">{{ __('user.secondary_address') }}</label>
                            <div class="col-md-4">
                                <input type="text" name="secondary_address" class="form-control"
                                    value="{{ old('secondary_address', $secondaryAddress) }}"
                                    data-validation="length" data-validation-length="0-100">
                                @if ($errors->has('secondary_address'))
                                <label for="secondary_address" class="error">{{ $errors->first('secondary_address') }}</label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="">{{ __('user.birthday') }}</label>
                            <div class="col-md-4">
                                <input type="text" data-plugin-masked-input data-input-mask="99/99/9999"
                                    placeholder="dd/mm/yyyy" name="birthday" class="form-control" 
                                    value="{{ old('birthday', $birthday) }}">
                                @if ($errors->has('birthday'))
                                <label for="birthday" class="error">{{ $errors->first('birthday') }}</label>
                                @endif
                            </div>

                            <label class="col-md-2 control-label" for="">{{ __('user.job') }}</label>
                            <div class="col-md-4">
                                <input type="text" name="job" class="form-control"
                                    value="{{ old('job', $job) }}"
                                    data-validation="length" data-validation-length="0-50">
                                @if ($errors->has('job'))
                                <label for="job" class="error">{{ $errors->first('job') }}</label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="">Facebook</label>
                            <div class="col-md-4">
                                <input type="url" name="facebook" class="form-control" 
                                    value="{{ old('facebook', $facebook) }}"
                                    data-validation="length" data-validation-length="0-100" >
                                @if ($errors->has('facebook'))
                                <label for="facebook" class="error">{{ $errors->first('facebook') }}</label>
                                @endif
                            </div>
                            <label class="col-md-2 control-label" for="">Google Plus</label>
                            <div class="col-md-4">
                                <input type="url" name="google_plus" class="form-control" 
                                    value="{{ old('google_plus', $googlePlus) }}"
                                    data-validation="length" data-validation-length="0-100">
                                @if ($errors->has('secondary_address'))
                                <label for="google_plus" class="error">{{ $errors->first('google_plus') }}</label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="">Twitter</label>
                            <div class="col-md-4">
                                <input type="url" name="twitter" class="form-control" 
                                    value="{{ old('twitter', $twitter) }}"
                                    data-validation="length" data-validation-length="0-100">
                                @if ($errors->has('twitter'))
                                <label for="twitter" class="error">{{ $errors->first('twitter') }}</label>
                                @endif
                            </div>
                            <label class="col-md-2 control-label" for="">Skype</label>
                            <div class="col-md-4">
                                <input type="text" name="skype" class="form-control" 
                                    value="{{ old('skype', $skype) }}"
                                    data-validation="length" data-validation-length="0-100">
                                @if ($errors->has('skype'))
                                <label for="skype" class="error">{{ $errors->first('skype') }}</label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="">Website</label>
                            <div class="col-md-4">
                                <input type="url" name="website" class="form-control" 
                                    value="{{ old('website', $website) }}"
                                    data-validation="length" data-validation-length="0-100">
                                @if ($errors->has('website'))
                                <label for="website" class="error">{{ $errors->first('website') }}</label>
                                @endif
                            </div>
                            <label class="col-md-2 control-label" for="">Phone</label>
                            <div class="col-md-4">
                                <div class="input-group mb-md">
                                    <div class="input-group-btn">
                                        <button tabindex="-1" class="btn dropdown-toggle country-code" type="button" data-toggle="dropdown" aria-expanded="false" >{{ old('countryCode', $countryCode) }}</button>
                                        <ul role="menu" class="dropdown-menu country-code-menu">
                                            <li><a href="javascript:;">VN</a></li>
                                            <li><a href="javascript:;">UK</a></li>
                                        </ul>
                                    </div>
                                    <input type="tel" class="form-control" data-plugin-masked-input data-input-mask="999 999 99 99" name="phone_number" placeholder="0974 12 34 56" value="{{ old('phone_number', $phoneNumber) }}">
                                    <input type="hidden" name="country_code" value="{{ old('country_code', $countryCode) }}">
                                </div>
                                @if ($errors->has('website'))
                                <label for="website" class="error">{{ $errors->first('website') }}</label>
                                @endif
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="">{{ __('user.about') }}</label>
                            <div class="col-md-10">
                                <textarea name="about" class="form-control" rows="3"
                                    data-validation="length" data-validation-length="0-150">{{ old('about', $about) }}</textarea>
                                @if ($errors->has('about'))
                                <label for="about" class="error">{{ $errors->first('about') }}</label>
                                @endif
                            </div>

                        </div>
                        
                    </form>
                </div>
            </section>
        </div>
        
    </div>
    <!-- end: page -->
</section>
@endsection
@section('footer') 
<script src="{{ asset('admin/assets/vendor/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('admin/assets/phone-number.js') }}"></script>
<script src="{{ asset('admin/assets/uploadfile-laravel-filemanager.js') }}"></script>
<script src="{{ asset('admin/assets/jquery-form-validator/form-validator/jquery.form-validator.min.js') }}"></script>
<script>
  $.validate({
    modules : 'html5',
    lang : '{{ session('locale') }}'
  });
</script>
@endsection
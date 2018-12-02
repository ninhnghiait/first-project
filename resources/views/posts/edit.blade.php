@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('adusers.update', $item->id) }}"  method="POST" role="form" class="col-md-12">
            <legend>User Edit</legend>
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $item->name }}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $item->email }}">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="">Roles</label>
                <select name="roles[]" class="form-control" multiple="" size="{{ $roles->count() }}">
                    @php
                        $arRole = $item->roles->pluck('id')->toArray();
                    @endphp
                    @foreach ($roles as $r)
                    <option value="{{ $r->id }}" {{ in_array($r->id, $arRole) ? 'selected' : '' }}>{{ $r->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('adusers.store') }}"  method="POST" role="form" class="col-md-12">
            <legend>User Create</legend>
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Roles</label>
                <select name="roles[]" class="form-control" multiple="" size="{{ $roles->count() }}">
                    @foreach ($roles as $r)
                    <option value="{{ $r->id }}">{{ $r->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
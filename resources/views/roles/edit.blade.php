@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('adroles.update', $item->id) }}"  method="POST" role="form" class="col-md-12">
            <legend>Role Edit</legend>
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $item->name }}" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Display Name</label>
                <input type="text" name="display_name" class="form-control" value="{{ $item->display_name }}" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="description" class="form-control" value="{{ $item->description }}" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Permision</label>
                <select name="permision[]" class="form-control" multiple="" size="{{ $permissions->count() }}">
                    @php
                        $arPermissions = $item->permissions->pluck('id')->toArray();
                    @endphp
                    @foreach ($permissions as $p)
                    <option value="{{ $p->id }}" {{ in_array($p->id, $arPermissions) ? 'selected' : '' }}>{{ $p->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
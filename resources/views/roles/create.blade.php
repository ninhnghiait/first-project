@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('adroles.store') }}"  method="POST" role="form" class="col-md-12">
            <legend>Role Create</legend>
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Display Name</label>
                <input type="text" name="display_name" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="description" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Permision</label>
                <select name="permisions[]" class="form-control" multiple="" size="{{ $permissions->count() }}">
                    @foreach ($permissions as $p)
                    <option value="{{ $p->id }}">{{ $p->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-3">
    	<!-- Sidebar -->
		<?php $menu = ['post'] ?>
        @include('sidebar', ['menu' => $menu])
        <!-- /#sidebar-wrapper -->
    	</div>
    	<div class="col-md-9">
    	<h3 class="text-info text-left">Post</h3>
    	<a href="{{ route('adposts.create') }}" class="btn btn-info btn-sm">Create</a> <br> <br>
    	<table class="table table-hover">
    		<thead>
    			<tr>
    				<th>ID</th>
    				<th>Title</th>
                    <th>Picture</th>
                    <th>Pulished</th>
                    <th>User</th>
    				<th>Counter</th>
    				<th>Action</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse ($items as $item)
    			@php
    				$id = $item->id;
                    $title = $item->title;
                    $picture = $item->picture;
                    $published = $item->published;
                    $counter = $item->counter;
    				$user = $item->owner;
    			@endphp
    			<tr>
    				<td>{{ $id }}</td>
    				<td>{{ $title }}</td>
    				<td>
                        <img src="{{ asset('storage/app/posts/'.$picture) }}" alt="">            
                    </td>
                    <td>
                        <input type="checkbox" {{ $published ? 'checked' : '' }}>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $counter }}</td>
    				<td>
                        <a href="{{ route('adposts.edit', $id) }}" class="btn btn-success btn-sm">edit</a>
    					<a href="javascript:;" class="btn btn-warning btn-sm" onclick="$(this).next().submit()">delete</a>
                        <form action="{{ route('adposts.destroy', $id) }}" style="display: none" method="post">
                            @csrf
                            @method('delete')
                        </form>
    				</td>
    			</tr>
    			@empty
    			<tr>
    				<td colspan="5">Nodata</td>
    			</tr>	
    			@endforelse
    		</tbody>
    	</table>
    	{{ $items->links() }}
    	</div>
    </div>
</div>
@endsection
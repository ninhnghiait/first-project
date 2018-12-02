@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-3">
    	<!-- Sidebar -->
		<?php $menu = ['contact'] ?>
        @include('sidebar', ['menu' => $menu])
        <!-- /#sidebar-wrapper -->
    	</div>
    	<div class="col-md-9">
    	<h3 class="text-info text-left">Contact</h3>
    	<a href="{{ route('adcontacts.create') }}" class="btn btn-info btn-sm">Create</a> <br> <br>
    	<table class="table table-hover">
    		<thead>
    			<tr>
    				<th>ID</th>
    				<th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
    				<th>Replied</th>
    				<th>Action</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse ($items as $item)
    			@php
    				$id = $item->id;
                    $name = $item->name;
                    $email = $item->email;
                    $phone = $item->phone;
                    $address = $item->address;
    				$replyed = $item->replyed;
    			@endphp
    			<tr>
    				<td>{{ $id }}</td>
    				<td>{{ $name }}</td>
                    <td>{{ $email }}</td>
                    <td>{{ $phone }}</td>
                    <td>{{ $address }}</td>
    				<td>{{ $replyed ? 'Yes' : 'No' }}</td>
    				<td>
                        {{-- <a href="{{ route('adroles.edit', $id) }}" class="btn btn-success btn-sm">edit</a> --}}
    					<a href="javascript:;" class="btn btn-warning btn-sm" onclick="$(this).next().submit()">delete</a>
                        <form action="{{ route('adcontacts.destroy', $id) }}" style="display: none" method="post">
                            @csrf
                            @method('delete')
                        </form>
    				</td>
    			</tr>
    			@empty
    			<tr>
    				<td colspan="5">No data</td>
    			</tr>	
    			@endforelse
    		</tbody>
    	</table>
    	{{ $items->links() }}
    	</div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-3">
    	<!-- Sidebar -->
		<?php $menu = ['fts'] ?>
        @include('sidebar', ['menu' => $menu])
        <!-- /#sidebar-wrapper -->
    	</div>
    	<div class="col-md-9">
    	<h3 class="text-info text-left">Full Text Search</h3>
        <form action="{{ route('adfts.search') }}" method="get">
            <div class="form-group">
                <input type="text" name="q" class="form-control" value="{{ isset($q) ? $q : '' }}">
            </div>
        </form>
    	<table class="table table-hover">
    		<thead>
    			<tr>
    				<th>ID</th>
                    <th>First Name</th>
    				<th>Last Name</th>
    				<th>Email</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse ($items as $item)
    			@php
    				$id = $item->id;
                    $first_name = $item->first_name;
                    $last_name = $item->last_name;
    				$email = $item->email;
    			@endphp
    			<tr>
    				<td>{{ $id }}</td>
                    <td>{{ $first_name }}</td>
    				<td>{{ $last_name }}</td>
    				<td>{{ $email }}</td>
    			</tr>
    			@empty
    			<tr>
    				<td colspan="5">Nodata</td>
    			</tr>	
    			@endforelse
    		</tbody>
    	</table>
    	{{ $items->appends(request()->input())->links() }}
    	</div>
    </div>
</div>
@endsection
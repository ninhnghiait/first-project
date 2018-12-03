@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-3">
    	<!-- Sidebar -->
		<?php $menu = ['user-activity'] ?>
        @include('sidebar', ['menu' => $menu])
        <!-- /#sidebar-wrapper -->
    	</div>
    	<div class="col-md-9">
    	<h3 class="text-info text-left">User Activities</h3>
        @forelse($items as $item)
        @php
            $author = $item->causer;
            $authorInfo = $author->name;
            $description = $item->description; 
            $subject = $item->subject;
            $subjectInfo = $subject->name;
        @endphp
    	<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{ $authorInfo }}</strong> {{ $description }} {{ $subjectInfo }}
        </div>
    	{{ $items->links() }}
        @empty
        No activity
        @endforelse
    	</div>
    </div>
</div>
@endsection
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
            $authorInfo = !is_null($author) ? $author->name : 'Guest';
            $description = $item->description; 
            $subject = $item->subject;
            $subjectInfo = !is_null($subject) ? $subject->name : '';
            $atributes = $item->getExtraProperty('attributes');
            $atributesInfo = !empty($atributes) ? implode('/', $atributes).'<br>' : '';
            $old = $item->getExtraProperty('old');
            $oldInfo = !empty($old) ? '['.implode('/', $atributes).']' : '';
            $created_at = $item->created_at->toDateTimeString();
        @endphp
    	<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{ $authorInfo }}</strong> {{ $description }} {{ $subjectInfo }} at <i>{{ $created_at }}</i><br>
            {!! $atributesInfo !!} {!! $oldInfo !!}
        </div>
    	{{ $items->links() }}
        @empty
        No activity
        @endforelse
    	</div>
    </div>
</div>
@endsection
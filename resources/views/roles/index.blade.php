@extends('layouts.master')
@section('main')    
<section role="main" class="content-body">
    @component('components.admin.header-main', ['title' => __('header_title.role_management')])
        @slot('ol')
            <li><span>{{ __('header_title.platform_administration') }}</span></li>
            <li><span>{{ __('header_title.role_management') }}</span></li>
        @endslot
    @endcomponent
    
    @if (session('msg'))
        @component('components.admin.alert', ['type' => 'success', 'title' => session('msg')])
        @endcomponent
    @endif
    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="row">
                        <div class="col-sm-6 pull-left text-left">
                        </div>
                        <div class="col-sm-6 pull-right text-right">
                            <a href="{{ route('adroles.create') }}" id="" class="btn btn-info"><i class="fa fa-plus"></i> {{ __('action.create') }} </a>
                            <button id="" class="btn btn-info"><i class="fa fa-circle-o-notch"></i> Reload </button>
                        </div>
                    </div>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-none">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('permission.name') }}</th>
                                    <th>{{ __('permission.display_name') }}</th>
                                    <th>{{ __('permission.description') }}</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                @php
                                $id = $item->id;
                                $name = $item->name;
                                $display_name = $item->display_name;
                                $description = $item->description;
                                @endphp
                                <tr>
                                    <td>{{ $id }}</td>
                                    <td><a href="{{ route('adroles.edit', $id) }}">{{ $name }}</a></td>
                                    <td>{{ $display_name }}</td>
                                    <td>{{ $description }}</td>
                                    <td class="actions-hover actions-fade">
                                        <a href="{{ route('adroles.edit', $id) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:;" class="delete-row" onclick="$(this).next().submit()"><i class="fa fa-trash-o"></i></a>
                                        <form action="{{ route('adroles.destroy', $id) }}" style="display: none" method="post">
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
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>
@endsection

@extends('layouts.master')

@section('main')    
<section role="main" class="content-body">
    @component('components.admin.header-main', ['title' => __('header_title.user_management')])
        @slot('ol')
            <li><span>{{ __('header_title.platform_administration') }}</span></li>
            <li><span>{{ __('header_title.user_management') }}</span></li>
        @endslot
    @endcomponent
    
    <!-- start: filter -->
    <div class="row appear-animation bounceInUp" data-appear-animation="bounceInUp" id="filter-form">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                    <form class="form-inline">
                        <h4>Filter(s)</h4>
                        <div class="form-group">
                            <button type="button" class="btn btn-light">First Name</button>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">First Name</label>
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Value">
                        </div>
                        <div class="clearfix visible-xs mb-sm"></div>
                        <div class="form-group">
                            <a href="javascript:;"><i class="fa fa-trash-o"></i></a>
                        </div>
                        <div class="visible-sm clearfix mt-sm mb-sm"></div>

                        <div class="clearfix visible-xs mb-sm"></div>
                    </form>
                    <div class="form-group form-inline" style="margin-top: 5px">
                        <select class="form-control" name="" id="">
                            <option value="">Add additional filter</option>
                            <option value="">First Name</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Apply</button>
                        <button type="button" id="cancel-filter-form" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="row">
                        <div class="col-sm-6 pull-left text-left">
                            <button id="active-filter-form" class="btn btn-info">Filter(s) </button>
                        </div>
                        <div class="col-sm-6 pull-right text-right">
                            <a href="{{ route('adusers.create') }}" id="" class="btn btn-info"><i class="fa fa-plus"></i> {{ __('action.create') }} </a>
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
                                    <th>{{ __('user.username') }}</th>
                                    <th>{{ __('user.fullname') }}</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                @php
                                $id = $item->id;
                                $name = $item->name;
                                $email = $item->email;
                                $fullname = $item->fullname;
                                $description = $item->description;
                                @endphp
                                <tr>
                                    <td>{{ $id }}</td>
                                    <td>{{ $name }}</td>
                                    <td>{{ $fullname }}</td>
                                    <td>{{ $email }}</td>
                                    <td class="actions-hover actions-fade">
                                        <a href="{{ route('adusers.edit', $id) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:;" class="delete-row" onclick="$(this).next().submit()"><i class="fa fa-trash-o"></i></a>
                                        <form action="{{ route('adusers.destroy', $id) }}" style="display: none" method="post">
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
                <div class="row">
                    <div class="col-sm-12 col-md-6 pull-left"><div class="dataTables_info" id="datatable-tabletools_info" role="status" aria-live="polite">Showing {{ $items->currentPage() }} to {{ $items->lastPage() }} of {{ $items->total() }} entries</div></div>
                    <div class="col-sm-12 col-md-6 text-right">{{ $items->links() }}</div>
                </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>
@endsection
@section('footer')
<script>
    var a = true;
    $('#filter-form').hide();
    $('#active-filter-form').click(function() {
        if(a) { $('#filter-form').show(); a = false;} else {$('#filter-form').hide(); a = true;};
    });
    $('#cancel-filter-form').click(function() {
        $('#filter-form').hide(); a = true;
    });
</script>
@endsection

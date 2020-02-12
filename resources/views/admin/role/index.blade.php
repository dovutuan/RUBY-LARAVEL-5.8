@extends('layouts_admin.app')
@section('content')

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        @include('layouts_admin.alert')
                        <div class="row">
                            <div class="col-md-11 text-left">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">{{ __('messages.a-home') }}</a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page">{{ __('messages.a-role') }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-1 clearfix text-right">
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#myModal">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 clearfix text-right">
                                <div class="search-box pull-right">
                                    <form action="" method="GET">
                                        <input type="text" name="key" placeholder="Search..."
                                               value="{{ isset($key) ? $key : old('key') }}">
                                        <i class="ti-search"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th>Stt</th>
                                        <th>{{ __('messages.a-name') }}</th>
                                        <th>{{ __('messages.a-date-create') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->created_at->format('H:i:s d-m-Y')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="3"
                                            class="text-right">{{ __('messages.a-total-role:') }} {{$totalRole}}
                                            <sup>{{ __('messages.a-role') }}</sup>
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.role.modal')

@endsection

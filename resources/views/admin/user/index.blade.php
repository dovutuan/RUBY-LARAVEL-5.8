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
                                            aria-current="page">{{ __('messages.a-user') }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-1 clearfix text-right">
                                <a href="{{route('export.user')}}" class="btn btn-sm btn-info"><i
                                        class="fa fa-file-excel-o"></i></a>
                                @can('user-create')
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#myModal">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                @endcan
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 clearfix text-right">
                                <div class="search-box pull-right">
                                    <form action="" method="GET">
                                        <input type="text" name="key" placeholder="{{ __('messages.search...') }}"
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
                                        <th>{{ __('messages.a-status') }}</th>
                                        <th>{{ __('messages.a-role') }}</th>
                                        <th>{{ __('messages.a-date-create') }}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <th class="text-left"><img class="img-user" src="{{$user->image}}"
                                                                       alt=""> {{$user->name}}</th>
                                            <td>
                                                <a href="{{route('change.status.user', $user->id)}}">
                                                    <input readonly
                                                           type="radio" {{ $user->getStatus($user->status)['check'] }}>
                                                    {{ $user->getStatus($user->status)['name'] }}
                                                </a>
                                            </td>
                                            <td>
                                                @foreach($user->getRoleNames() as $getRoleName)
                                                    <lable class="badge badge-success">{{$getRoleName}}</lable>
                                                @endforeach
                                            </td>
                                            <td>{{$user->created_at->format('H:i:s d-m-Y')}}</td>
                                            <td class="text-right">
                                                <a title="reset password"
                                                   href="{{route('refresh.password.user', $user->id)}}"
                                                   class="btn btn-xs btn-outline-info"
                                                   onclick="return confirm('Do you want to update the password?')"><i
                                                        class="fa fa-refresh"></i></a>
                                                @can('user-edit')
                                                    <a href="{{route('edit.user', $user->id)}}"
                                                       class="btn btn-xs btn-outline-success"><i
                                                            class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('user-delete')
                                                    <a href="{{route('destroy.user', $user->id)}}"
                                                       class="btn btn-xs btn-outline-danger"
                                                       onclick="return confirm('Do you want to delete?')"><i
                                                            class="fa fa-trash"></i></a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="6"
                                            class="text-right">{{ __('messages.a-total-user:') }} {{$totalUser}}
                                            <sup>{{ __('messages.a-user') }}</sup></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        {{ $users->appends(['key' => $key])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.user.modal')
@endsection

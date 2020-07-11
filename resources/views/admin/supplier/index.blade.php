@extends('layouts_admin.app')
@section('content')

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 text-left">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">{{ __('messages.a-home') }}</a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page">{{ __('messages.a-supplier') }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-2 clearfix text-right">
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
                                        <th>{{ __('messages.a-stt') }}</th>
                                        <th>{{ __('messages.a-name') }}</th>
                                        <th>{{ __('messages.a-information') }}</th>
                                        <th>{{ __('messages.a-date-create') }}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($suppliers as $supplier)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <th>{{$supplier->name}}</th>
                                            <td class="text-left">
                                                <ul>
                                                    <li><b>{{ __('messages.a-company') }}</b>: {{$supplier->company}}</li>
                                                    <li><b>{{ __('messages.a-phone') }}</b>: {{$supplier->phone}}</li>
                                                    <li><b>{{ __('messages.a-fax') }}</b>: {{$supplier->fax}}</li>
                                                    <li><b>{{ __('messages.a-email') }}</b>: {{$supplier->email}}</li>
                                                    <li><b>{{ __('messages.a-address') }}</b>: {{$supplier->address}}</li>
                                                </ul>
                                            </td>
                                            <td>{{$supplier->created_at->format('H:i:s d-m-Y')}}</td>
                                            <td class="text-right">
                                                @can('supplier-edit')
                                                    <a href="{{route('edit.supplier', $supplier->id)}}"
                                                       class="btn btn-xs btn-outline-success"><i
                                                            class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('supplier-delete')
                                                    <a href="{{route('destroy.supplier', $supplier->id)}}"
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
                                            class="text-right">{{ __('messages.a-total-supplier:') }} {{$totalSupplier}}
                                            <sup>{{ __('messages.a-supplier') }}</sup></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        {{--                        {{ $suppliers->appends(['key' => $key])->links() }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('admin.supplier.modal')

@endsection

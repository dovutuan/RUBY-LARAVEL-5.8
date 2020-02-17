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
                                            aria-current="page">{{ __('messages.a-product') }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-1 clearfix text-right">
                                <a href="{{route('export.product')}}" class="btn btn-sm btn-info"><i
                                        class="fa fa-file-excel-o"></i></a>
                                @can('product-create')
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
                                        <th>{{ __('messages.a-stt') }}</th>
                                        <th>{{ __('messages.a-name') }}</th>
                                        <th>{{ __('messages.a-date-create') }}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <td>
                                                <a href="{{route('show.product', $product->id)}}">{{$product->name}}</a>
                                            </td>
                                            <td>{{$product->created_at->format('H:i:s d-m-Y')}}</td>
                                            <td class="text-right">
                                                <a href="{{route('edit.product', $product->id)}}" class="btn btn-xs btn-outline-success"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{route('destroy.product', $product->id)}}"
                                                   class="btn btn-xs btn-outline-danger"
                                                   onclick="return confirm('Do you want to delete?')"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="4"
                                            class="text-right">{{ __('messages.a-total-product:') }} {{$totalProduct}}
                                            <sup>{{ __('messages.a-product') }}</sup></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.product.modal')


@section('script')
    <script>
        $(document).ready(function () {
            $('#add').click(function () {
                $('#dynamic_field').append('<div class="col-md-3"><div class="form-group"> <label class="control-label"><b>{{ __('messages.a-size') }}</b></label> <select name="size_id[]" class="s-example-basic-single form-control">@foreach($sizes as $size)<option value="{{$size->id}}">{{$size->name}}</option>@endforeach</select></div></div><div class="col-md-3"><div class="form-group"><label class="control-label"><b>{{ __('messages.a-color') }}</b></label><select name="color_id[]" class="s-example-basic-single form-control">@foreach($colors as $color)<option value="{{$color->id}}">{{$color->name}}</option>@endforeach</select></div></div><div class="col-md-3"><div class="form-group"><label class="control-label"><b>{{ __('messages.a-amount') }}</b></label><input name="amount[]" id="amount" type="number" min="0"class="form-control" value="{{old('amount')}}"/></div></div><div class="col-md-3"><div class="form-group"><label class="control-label"><b>{{ __('messages.a-price') }}</b></label><div class="input-group mb-3"><input name="price[]" id="price" min="0" type="number" class="form-control" value="{{old('price')}}"><div class="input-group-append"><span class="input-group-text">vnđ</span></div></div></div></div>');
            });
        });
    </script>
@stop

@endsection

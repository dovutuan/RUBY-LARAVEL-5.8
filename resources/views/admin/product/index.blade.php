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
                                            aria-current="page">{{ __('messages.a-product') }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-2 clearfix text-right white-space-nowrap">
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
                                        <th class="text-left">{{ __('messages.a-name') }}</th>
                                        <th>{{ __('messages.a-date-create') }}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <td class="text-left">
                                                <a href="{{route('show.product', $product->id)}}"><b>{{$product->name}}</b></a>
                                            </td>
                                            <td>{{$product->created_at->format('H:i:s d-m-Y')}}</td>
                                            <td class="text-right">
                                                <a href="{{route('edit.product', $product->id)}}"
                                                   class="btn btn-xs btn-outline-success"><i
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
                        {{ $products->appends(['key' => $key])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.product.modal')


@section('script')
    <script>
        $(document).ready(function () {
            var i = 1;
            $('#add').click(function () {
                $('#dynamic_field').append('<div id="stt' + i + '" style="display: contents"><div class="col-md-7"><div class="form-group"><label class="control-label"><b>{{ __('messages.a-amount') }} / {{ __('messages.a-species') }}</b></label><div class="input-group mb-3"><input name="amount[]" id="amount" type="number" min="0" class="form-control" value="{{old('amount[]') ? old('amount[]') : 0}}"/><div class="input-group-prepend"><select name="specie_id[]" class="s-example-basic-single form-control">@foreach($species as $specie)<option value="{{$specie->id}}">{{$specie->name}}</option>@endforeach</select></div></div></div></div><div class="col-md-4"><div class="form-group"><label class="control-label"><b>{{ __('messages.a-price') }}</b></label><div class="input-group mb-3"><input name="price[]" id="price" min="0" type="number" class="form-control" value="{{old('price[]') ? old('price[]') :0}}"><div class="input-group-append"><span class="input-group-text">vnđ</span></div></div></div></div><div class="col-md-1"> <div class="form-group"> <button style="margin-top: 29px;margin-left: -8px;" type="button" name="remove" id="' + i + '" class="btn btn-sm btn-outline-danger btn_remove"><i class="fa fa-times"></i></button> </div></div></div>');
            });

            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#stt' + button_id + '').remove();
            });
        });
    </script>
@stop

@endsection

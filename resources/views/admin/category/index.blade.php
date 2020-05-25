@extends('layouts_admin.app')
@section('content')

    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-11 text-left">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">{{ __('messages.a-home') }}</a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page">{{ __('messages.a-category') }}</li>
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
                                        <th></th>
                                        <th>Stt</th>
                                        <th class="text-left">{{ __('messages.a-name') }}</th>
                                        <th>{{ __('messages.a-date-create') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="text-left">
                                                @if(!($category->category_id))
                                                    @can('category-edit')
                                                        <a class="btn btn-xs btn-outline-success"><i
                                                                class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('category-delete')
                                                        <a class="btn btn-xs btn-outline-danger"><i
                                                                class="fa fa-trash"></i></a>
                                                    @endcan
                                                @else
                                                    @can('category-edit')
                                                        <a href="{{route('edit.category', $category->id)}}"
                                                           class="btn btn-xs btn-outline-success"><i
                                                                class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('category-delete')
                                                        <a href="{{route('destroy.category', $category->id)}}"
                                                           class="btn btn-xs btn-outline-danger"
                                                           onclick="return confirm('Do you want to delete?')"><i
                                                                class="fa fa-trash"></i></a>
                                                    @endcan
                                                @endif
                                            </td>
                                            <th>{{$loop->iteration}}</th>
                                            <th class="text-left">
                                                <ul>
                                                    <li>
                                                        {{$category->name}}
                                                        <ul>
                                                            @foreach ($category->childrenCategories as $childCategory)
                                                                @include('admin.category.child_category', ['child_category' => $childCategory])
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>

                                            </th>
                                            <td>{{$category->created_at->format('H:i:s d-m-Y')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="6"
                                            class="text-right">{{ __('messages.a-total-category:') }} {{$totalCategory}}
                                            <sup>{{ __('messages.a-category') }}</sup></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        {{ $categories->appends(['key' => $key])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.category.modal')

@endsection

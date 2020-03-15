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
                                        <li class="breadcrumb-item"
                                            aria-current="page"><a href="#">{{ __('messages.a-category') }}</a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page">{{ __('messages.a-category-edit') }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <form action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label
                                            class="control-label"><b>{{ __('messages.a-parent-category') }}</b></label>
                                        <select name="category_id" class="form-control">
                                            <option></option>
                                            @foreach($allCategories as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>{{ __('messages.a-status') }}</b></label>
                                        <select name="status" class="form-control">
                                            <option value="1">{{ __('messages.active') }}</option>
                                            <option value="0">{{ __('messages.inactive') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label"><b>{{ __('messages.a-name') }} <span
                                                    class="text-danger">*</span></b></label>
                                        <input name="name" type="text" class="form-control" value="{{$category->name}}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>{{ __('messages.a-icon') }}</b></label>
                                        <input type="text" class="form-control" name="icon" value="{{$category->icon}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><b>{{ __('messages.a-image') }}</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <buton id="btnImage"
                                               class="btn btn-outline-success">{{ __('messages.select-image') }}
                                        </buton>
                                    </div>
                                    <input name="image" id="txtImage" type="text" class="form-control"
                                           value="{{$category->image}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-xs btn-outline-dark"
                                        onclick="window.history.go(-1); return false;"><i
                                        class="fa fa-angle-double-left"> {{ __('messages.back-to-list') }}</i></button>
                                <button type="submit" class="btn btn-xs btn-success">{{ __('messages.edit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

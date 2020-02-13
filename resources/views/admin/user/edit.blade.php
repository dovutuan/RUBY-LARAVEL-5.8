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
                                            aria-current="page"><a href="#">{{ __('messages.a-role') }}</a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page">{{ __('messages.a-role-edit') }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <form action="" method="post">
                            @csrf
                            <div class="demo">
                                <div class="control-group">
                                    <label class="control-label"><b>{{ __('messages.a-role') }}</b></label>
                                    <select id="select-state" name="role_id[]" multiple class="demo-default">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}"
                                                    @foreach($userRoles as $userRole) @if($role->name == $userRole) selected @endif @endforeach>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label class="control-label"><b>{{ __('messages.a-name') }}</b></label>
                                        <input name="name" type="text" class="form-control" value="{{$user->name}}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label"><b>{{ __('messages.a-phone') }}</b></label>
                                        <input name="phone" type="number" class="form-control" value="{{$user->phone}}">
                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="control-label"><b>{{ __('messages.a-status') }}</b></label>
                                        <select name="status" class="form-control">
                                            <option value="1">{{ __('messages.active') }}</option>
                                            <option value="0">{{ __('messages.inactive') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><b>{{ __('messages.a-gender') }}</b></label>
                                        <select name="gender" class="form-control">
                                            <option value="0">{{ __('messages.male') }}</option>
                                            <option value="1">{{ __('messages.female') }}</option>
                                            <option value="2">{{ __('messages.other') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><b>{{ __('messages.a-birth') }}</b></label>
                                        <input name="birth" type="date" class="form-control"
                                               value="{{$user->birth}}">
                                        @error('birth')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label"><b>{{ __('messages.a-image') }}</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <buton id="btnImage1"
                                                       class="btn btn-outline-success">{{ __('messages.select-image') }}</buton>
                                            </div>
                                            <input name="image" id="txtImage1" type="text" class="form-control"
                                                   value="{{old('image')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label class="control-label"><b>{{ __('messages.a-address') }}</b></label>
                                        <input name="address" type="text" class="form-control"
                                               value="{{$user->address}}">
                                        @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label"><b>{{ __('messages.a-email') }}</b></label>
                                        <input name="email" type="email" class="form-control" value="{{$user->email}}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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

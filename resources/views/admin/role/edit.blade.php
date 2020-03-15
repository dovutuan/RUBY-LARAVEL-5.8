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
                            <div class="form-group">
                                <label class="control-label"><b>{{ __('messages.name-role') }} <span class="text-danger">*</span></b></label>
                                <input name="name" type="text" class="form-control" value="{{$role->name}}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="demo">
                                    <div class="control-group">
                                        <label class="control-label"><b>Permission</b></label>
                                        <select id="select-state" name="permission_id[]" multiple class="demo-default">
                                            @foreach($permissions as $permission)
                                                <option value="{{$permission->id}}"
                                                        @foreach($rolePermissions as $rolePermission) @if($permission->id == $rolePermission) selected @endif @endforeach>{{$permission->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('permission_id')
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

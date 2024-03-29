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
                                        <li class="breadcrumb-item"
                                            aria-current="page"><a href="#">{{ __('messages.a-user') }}</a></li>
                                        <li class="breadcrumb-item active"
                                            aria-current="page">{{ __('messages.a-user-edit') }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="txtImage">
                                            <img id="showImage" class="image-user"
                                                 src="{{$user->image ? fileUrl(USERS, $user->image) : asset('files') . '/users/no_image_user.svg'}}"
                                                 alt="">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-10">
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
                                                <label class="control-label"><b>{{ __('messages.a-name') }} <span
                                                            class="text-danger">*</span></b></label>
                                                <input name="name" type="text" class="form-control"
                                                       value="{{$user->name}}">
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-5">
                                                <label class="control-label"><b>{{ __('messages.a-phone') }} <span
                                                            class="text-danger">*</span></b></label>
                                                <input name="phone" type="number" class="form-control"
                                                       value="{{$user->phone}}">
                                                @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"><b>{{ __('messages.a-status') }}</b></label>
                                        <select name="status" class="form-control">
                                            <option value="1">{{ __('messages.active') }}</option>
                                            <option value="0">{{ __('messages.inactive') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><b>{{ __('messages.a-gender') }} <span
                                                    class="text-danger">*</span></b></label>
                                        <select name="gender" class="form-control">
                                            <option value="0">{{ __('messages.male') }}</option>
                                            <option value="1">{{ __('messages.female') }}</option>
                                            <option value="2">{{ __('messages.other') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label"><b>{{ __('messages.a-birth') }} <span
                                                    class="text-danger">*</span></b></label>
                                        <input name="birth" type="date" class="form-control"
                                               value="{{$user->birth}}">
                                        @error('birth')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-1 display-none">
                                        <input name="image" id="txtImage" type="file" accept="{{TYPE_FILES}}"
                                               class="form-control input-display-none"
                                               value="{{$user->image}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label class="control-label"><b>{{ __('messages.a-address') }} <span
                                                    class="text-danger">*</span></b></label>
                                        <input name="address" type="text" class="form-control"
                                               value="{{$user->address}}">
                                        @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label"><b>{{ __('messages.a-email') }} <span
                                                    class="text-danger">*</span></b></label>
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

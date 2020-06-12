<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('store.user')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create user</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="txtImage">
                                <img id="showImage" class="image-user"
                                     src="{{asset('files') . '/users/no_image_user.svg'}}"
                                     alt="">
                            </label>
                        </div>
                        <div class="col-md-10">
                            <div class="demo">
                                <div class="control-group">
                                    <label class="control-label"><b>{{ __('messages.a-role') }} <span
                                                class="text-danger">*</span></b></label>
                                    <select id="select-state" name="role_id[]" multiple class="demo-default">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
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
                                        <input name="name" id="name" type="text" class="form-control"
                                               placeholder="{{ __('messages.name') }}" value="{{old('name')}}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label"><b>{{ __('messages.a-phone') }} <span
                                                    class="text-danger">*</span></b></label>
                                        <input name="phone" id="phone" type="number" class="form-control"
                                               placeholder="{{ __('messages.phone-number') }}" value="{{old('phone')}}">
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
                            <div class="col-md-4">
                                <label class="control-label"><b>{{ __('messages.a-status') }}</b></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">{{ __('messages.active') }}</option>
                                    <option value="0">{{ __('messages.inactive') }}</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b>{{ __('messages.a-gender') }} <span class="text-danger">*</span></b></label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="0">{{ __('messages.male') }}</option>
                                    <option value="1">{{ __('messages.female') }}</option>
                                    <option value="2">{{ __('messages.other') }}</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b>{{ __('messages.a-birth') }} <span
                                            class="text-danger">*</span></b></label>
                                <input name="birth" id="birth" type="date" class="form-control"
                                       value="{{old('birth')}}">
                                @error('birth')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 display-none">
                                <input name="image" id="txtImage" type="file"
                                       class="form-control"
                                       value="{{old('image')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-7">
                                <label class="control-label"><b>{{ __('messages.a-address') }} <span
                                            class="text-danger">*</span></b></label>
                                <input name="address" id="address" type="text" class="form-control"
                                       placeholder="{{ __('messages.address') }}" value="{{old('address')}}">
                                @error('address')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label class="control-label"><b>{{ __('messages.a-email') }} <span
                                            class="text-danger">*</span></b></label>
                                <input name="email" id="email" type="email" class="form-control"
                                       placeholder="{{ __('messages.email') }}" value="{{old('email')}}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{ __('messages.a-password') }} <span
                                    class="text-danger">*</span></b></label>
                        <input name="password" id="password" type="password" class="form-control"
                               placeholder="{{ __('messages.password') }}" value="{{old('password')}}">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{ __('messages.a-password-confirmation') }} <span
                                    class="text-danger">*</span></b></label>
                        <input name="password_confirmation" id="password_confirmation" type="password"
                               class="form-control"
                               placeholder="{{ __('messages.password-confirmation') }}"
                               value="{{old('password_confirmation')}}">
                        @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-check"></i></button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                            class="fa fa-close"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

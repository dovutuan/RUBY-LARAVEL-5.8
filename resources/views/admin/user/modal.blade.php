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
                    <div class="demo">
                        <div class="control-group">
                            <label class="control-label"><b>{{ __('messages.a-role') }}</b></label>
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
                                <label class="control-label"><b>{{ __('messages.a-name') }}</b></label>
                                <input name="name" id="name" type="text" class="form-control"
                                       placeholder="{{ __('messages.name') }}" value="{{old('name')}}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label class="control-label"><b>{{ __('messages.a-phone') }}</b></label>
                                <input name="phone" id="phone" type="number" class="form-control"
                                       placeholder="{{ __('messages.phone-number') }}" value="{{old('phone')}}">
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
                                <select name="status" id="status" class="form-control">
                                    <option value="1">{{ __('messages.active') }}</option>
                                    <option value="0">{{ __('messages.inactive') }}</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><b>{{ __('messages.a-gender') }}</b></label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="0">{{ __('messages.male') }}</option>
                                    <option value="1">{{ __('messages.female') }}</option>
                                    <option value="2">{{ __('messages.other') }}</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><b>{{ __('messages.a-birth') }}</b></label>
                                <input name="birth" id="birth" type="date" class="form-control"
                                       value="{{old('birth')}}">
                                @error('birth')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b>{{ __('messages.a-image') }}</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <buton id="btnImage"
                                               class="btn btn-outline-success">{{ __('messages.select-image') }}</buton>
                                    </div>
                                    <input name="image" id="txtImage" type="text" class="form-control"
                                           value="{{old('image')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-7">
                                <label class="control-label"><b>{{ __('messages.a-address') }}</b></label>
                                <input name="address" id="address" type="text" class="form-control"
                                       placeholder="{{ __('messages.address') }}" value="{{old('address')}}">
                                @error('address')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label class="control-label"><b>{{ __('messages.a-email') }}</b></label>
                                <input name="email" id="email" type="email" class="form-control"
                                       placeholder="{{ __('messages.email') }}" value="{{old('email')}}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{ __('messages.a-password') }}</b></label>
                        <input name="password" id="password" type="password" class="form-control"
                               placeholder="{{ __('messages.password') }}" value="{{old('password')}}">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{ __('messages.a-password-confirmation') }}</b></label>
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

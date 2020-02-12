<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('store.user')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create user</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><b>Role</b></label>
                        <select name="role_id" id="role_id" class="form-control">
                            @if($roles)
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-7">
                                <label class="control-label"><b>Name</b></label>
                                <input name="name" id="name" type="text" class="form-control"
                                       placeholder=" Please enter the user name" value="{{old('name')}}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label class="control-label"><b>Phone</b></label>
                                <input name="phone" id="phone" type="number" class="form-control"
                                       placeholder=" Please enter the phone number" value="{{old('phone')}}">
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><b>Status</b></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><b>Gender</b></label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="0">Boy</option>
                                    <option value="1">Girl</option>
                                    <option value="2">Other</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label"><b>Birth</b></label>
                                <input name="birth" id="birth" type="date" class="form-control"
                                       value="{{old('birth')}}">
                                @error('birth')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b>Image</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <buton id="btnImage1" class="btn btn-outline-success">Select Image</buton>
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
                                <label class="control-label"><b>Address</b></label>
                                <input name="address" id="address" type="text" class="form-control"
                                       placeholder=" Please enter the address" value="{{old('address')}}">
                                @error('address')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label class="control-label"><b>Email</b></label>
                                <input name="email" id="email" type="email" class="form-control"
                                       placeholder=" Please enter the email" value="{{old('email')}}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Password</b></label>
                        <input name="password" id="password" type="password" class="form-control"
                               placeholder=" Please enter the password" value="{{old('password')}}">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Password confirmation</b></label>
                        <input name="password_confirmation" id="password_confirmation" type="password"
                               class="form-control"
                               placeholder=" Please enter the password confirmation"
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

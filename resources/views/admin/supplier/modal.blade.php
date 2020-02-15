<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('store.supplier')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('messages.create_supplier') }}</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><b>{{ __('messages.a-name') }}</b></label>
                        <input name="name" type="text" class="form-control"
                               placeholder="{{ __('messages.name') }}" value="{{old('name')}}">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{ __('messages.a-company') }}</b></label>
                        <input name="company" type="text" class="form-control"
                               placeholder="{{ __('messages.company') }}" value="{{old('company')}}">
                        @error('company')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label"><b>{{ __('messages.a-email') }}</b></label>
                                <input name="email" type="email" class="form-control"
                                       placeholder="{{ __('messages.email') }}" value="{{old('email')}}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b>{{ __('messages.a-phone') }}</b></label>
                                <input name="phone" type="number" class="form-control"
                                       placeholder="{{ __('messages.phone-number') }}" value="{{old('phone')}}">
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b>{{ __('messages.a-fax') }}</b></label>
                                <input name="fax" type="text" class="form-control"
                                       placeholder="{{ __('messages.fax') }}" value="{{old('fax')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{ __('messages.a-address') }}</b></label>
                        <input name="address" type="text" class="form-control"
                               placeholder="{{ __('messages.address') }}" value="{{old('address')}}">
                        @error('address')
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

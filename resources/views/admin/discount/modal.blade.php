<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('store.discount')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('messages.create-discount') }}</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label"><b>{{ __('messages.a-name-discount') }} <span class="text-danger">*</span></b></label>
                                <input name="name" type="text" class="form-control"
                                       placeholder="{{ __('messages.name') }}" value="{{old('name')}}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><b>{{ __('messages.a-code-discount') }}</b></label>
                                <input name="code" type="text" class="form-control" maxlength="5"
                                       placeholder="{{ __('messages.code') }}" value="{{old('code')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><b>{{ __('messages.a-price') }} <span class="text-danger">*</span></b></label>
                                <input name="price" type="number" class="form-control" min="0"
                                       placeholder="{{ __('messages.price') }}" value="{{old('price')}}">
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><b>{{ __('messages.a-amount') }} <span class="text-danger">*</span></b></label>
                                <input name="amount" type="number" class="form-control" min="0"
                                       placeholder="{{ __('messages.amount') }}" value="{{old('amount')}}">
                                @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><b>{{ __('messages.a-start') }} <span class="text-danger">*</span></b></label>
                                <input name="start" type="date" class="form-control" value="{{old('start')}}">
                                @error('start')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><b>{{ __('messages.a-finish') }} <span class="text-danger">*</span></b></label>
                                <input name="finish" type="date" class="form-control" value="{{old('finish')}}">
                                @error('finish')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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

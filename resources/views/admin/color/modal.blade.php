<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('store.color')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('messages.create-color') }}</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label"><b>{{ __('messages.a-name-color') }}</b></label>
                                <input name="name" type="text" class="form-control"
                                       placeholder="{{ __('messages.name') }}" value="{{old('name')}}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><b>{{ __('messages.a-code-color') }}</b></label>
                            <input style="height: 42px" name="code" type="color" class="form-control"
                                   placeholder="{{ __('messages.name') }}" value="{{old('code')}}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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

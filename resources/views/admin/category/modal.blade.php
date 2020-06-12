<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('store.category')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('messages.create-category') }}</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtImage" class="label-margin-left">
                            <img id="showImage" class="image-user"
                                 src="{{asset('files') . '/categories/no_categories.jpg'}}"
                                 alt="">
                        </label>
                    </div>
                    <div class="form-group">
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
                                    <input name="name" type="text" class="form-control" value="{{old('name')}}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"><b>{{ __('messages.a-icon') }}</b></label>
                                    <input type="text" class="form-control" name="icon" value="{{old('icon')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group display-none">
                                <input name="image" id="txtImage" type="file" class="form-control"
                                       value="{{old('image')}}">
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

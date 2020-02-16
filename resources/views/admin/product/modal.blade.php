<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('store.product')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('messages.create-product') }}</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <ul class="step d-flex flex-nowrap">
                        <li class="step-item ">
                            <a data-toggle="collapse" data-target="#collapseOne"
                               aria-expanded="true"
                               aria-controls="collapseOne">{{ __('messages.a-product-information') }}</a>
                        </li>
                        <li class="step-item ">
                            <a data-toggle="collapse" data-target="#collapseTwo"
                               aria-expanded="false"
                               aria-controls="collapseTwo">{{ __('messages.a-image-product') }}</a>
                        </li>
                        <li class="step-item ">
                            <a data-toggle="collapse" data-target="#collapseThree"
                               aria-expanded="false"
                               aria-controls="collapseThree">{{ __('messages.a-option-information') }}</a>
                        </li>
                        <li class="step-item active">
                            <a data-toggle="collapse" data-target="#collapseFour"
                               aria-expanded="false" aria-controls="collapseFour">{{ __('messages.a-discount') }}</a>
                        </li>
                    </ul>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div id="collapseOne" class="collapse show"
                                 aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><b>{{ __('messages.a-name') }}</b></label>
                                                <input type="text" name="name" id="name"
                                                       class="form-control"
                                                       placeholder=" {{ __('messages.name') }}"
                                                       value="{{old('name')}}">
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b>{{ __('messages.a-category') }}</b></label>
                                                <select name="category_id" class="form-control">
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b>{{ __('messages.a-status') }}</b></label>
                                                <select name="status" class="form-control">
                                                    <option value="1">{{ __('messages.active') }}</option>
                                                    <option value="0">{{ __('messages.inactive') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b>{{ __('messages.a-content') }}</b></label>
                                                <textarea class="form-control" id="content"
                                                          name="content">{{old('content')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b>{{ __('messages.a-detail') }}</b></label>
                                                <textarea class="form-control" id="detail"
                                                          name="detail">{{old('detail')}}</textarea>
                                                @error('detail')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label"><b>{{ __('messages.a-image') }}</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <buton id="btnImage"
                                                       class="btn btn-outline-success">{{ __('messages.select-image') }}
                                                </buton>
                                            </div>
                                            <input name="image[]" id="txtImage" type="text" class="form-control"
                                                   value="{{old('image')}}">
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <span class="ac1"><button class="btn btn-xs btn-outline-primary"><i
                                                    class="faac1 fa fa-angle-double-down"></i></button></span>
                                        <span class="ac2"><button class="btn btn-xs btn-outline-primary"><i
                                                    class="faac2 fa fa-angle-double-down"></i></button></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="collapseThree" class="collapse"
                                 aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b>{{ __('messages.a-supplier') }}</b></label>
                                                <select class="form-control" name="supplier_id" id="supplier_id">
                                                    @foreach($suppliers as $supplier)
                                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label></label>
                                                <button type="button" name="add" id="add" class="form-control btn btn-sm btn-outline-success"><i
                                                        class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="dynamic_field">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label"><b>{{ __('messages.a-size') }}</b></label>
                                                <select name="size_id[]" class="s-example-basic-single form-control">
                                                    @foreach($sizes as $size)
                                                        <option
                                                            value="{{$size->id}}">{{$size->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('size_id')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label"><b>{{ __('messages.a-color') }}</b></label>
                                                <select name="color_id[]" class="s-example-basic-single form-control">
                                                    @foreach($colors as $color)
                                                        <option
                                                            value="{{$color->id}}">{{$color->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('color_id')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b>{{ __('messages.a-amount') }}</b></label>
                                                <input name="amount[]" id="amount" type="number" min="0"
                                                       class="form-control" value="{{old('amount')}}"/>
                                                @error('amount')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label"><b>{{ __('messages.a-price') }}</b></label>
                                                <div class="input-group mb-3">
                                                    <input name="price[]" id="price" min="0" type="number"
                                                           class="form-control" value="{{old('price')}}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">vnđ</span>
                                                    </div>
                                                </div>
                                                @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="collapseFour" class="collapse"
                                 aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"><b>{{ __('messages.a-sale') }}</b></label>
                                                <input name="sale" id="sale" type="number" min="0" max="100"
                                                       class="form-control"
                                                       value="{{old('sale')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label"><b>{{ __('messages.a-start') }}</b></label>
                                                <input name="start" id="start" type="date"
                                                       class="form-control invoice-date" value="{{old('start')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b>{{ __('messages.a-finish') }}</b></label>
                                                <input name="finish" id="finish" type="date"
                                                       class="form-control invoice-date" value="{{old('finish')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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


<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('store.product')}}" method="post" enctype="multipart/form-data">
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
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b>{{ __('messages.a-main-image') }}</b></label>
                                                <br>
                                                <label for="txtImage">
                                                    <img id="showImage" class="main_image"
                                                         src="{{asset('files') . '/products/no_products.jpg'}}"
                                                         alt="">
                                                </label>
                                                <input name="main_image" id="txtImage" type="file" accept="{{TYPE_FILES}}"
                                                       class="form-control display-none"
                                                       value="{{old('image')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b>{{ __('messages.a-secondary-image') }}</b></label>
                                                <br>
                                                <div class="row" id="rowImageSecondary">
                                                </div>
                                                <div class="form-group">
                                                    <button name="addImageSecondary" id="addImageSecondary"
                                                            type="button" class="form-control btn btn-outline-success">
                                                        <i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="collapseThree" class="collapse"
                                 aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label
                                            class="control-label"><b>{{ __('messages.a-supplier') }}</b></label>
                                        <select class="form-control" name="supplier_id" id="supplier_id">
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row" id="rowOption">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label
                                                    class="control-label"><b>{{ __('messages.a-amount') }}
                                                        / {{ __('messages.a-species') }}</b></label>
                                                <div class="input-group mb-3">
                                                    <input name="amount[]" id="amount" type="number" min="0"
                                                           class="form-control"
                                                           value="{{old('amount[]') ? old('amount[]') : ''}}"  placeholder="{{ZERO}}"/>
                                                    @error('amount')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="input-group-prepend">
                                                        <select name="specie_id[]"
                                                                class="s-example-basic-single form-control">
                                                            @foreach($species as $specie)
                                                                <option
                                                                    value="{{$specie->id}}">{{$specie->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('specie_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="control-label"><b>{{ __('messages.a-price') }}</b></label>
                                                <div class="input-group mb-3">
                                                    <input name="price[]" id="price" min="0" type="number"
                                                           class="form-control"
                                                           value="{{old('price[]') ? old('price[]') : ''}}" placeholder="{{ZERO}}">
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
                                    <div class="form-group">
                                        <button type="button" name="addOption" id="addOption"
                                                class="form-control btn btn-sm btn-outline-success"><i
                                                class="fa fa-plus"></i></button>
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
                                                       value="{{old('sale')}}" placeholder="0">
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


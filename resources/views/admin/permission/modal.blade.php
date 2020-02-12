<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('create.permission')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create user</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"><b>Name permission</b></label>
                        <input name="name" id="name" type="text" class="form-control"
                               placeholder="" value="{{old('name')}}">
                        @error('name')
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

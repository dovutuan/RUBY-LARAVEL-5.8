@if (session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
        {{ session('success') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
        {{ session('warning') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
        {{ session('error') }}
    </div>
@endif

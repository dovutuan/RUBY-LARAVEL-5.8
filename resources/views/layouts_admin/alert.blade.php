@if (session('success'))
    <div class="toast toast-success" data-autohide="false">
        <div class="toast-header">
            <strong class="mr-auto text-success"><i class="fa fa-check-circle"></i> {{ __('messages.success') }}
            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            <strong> {{ session('success') }}</strong>
        </div>
    </div>
@endif
@if (session('warning'))
    <div class="toast fade toast-warning" data-delay="3000" data-autohide="true">
        <div class="toast-header">
            <strong class="mr-auto text-warning"><i class="fa fa-exclamation-circle"></i> {{ __('messages.warning') }}
            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            <strong> {{ session('warning') }}</strong>
        </div>
    </div>
@endif
@if (session('error'))
    <div class="toast toast-danger" data-autohide="false">
        <div class="toast-header">
            <strong class="mr-auto text-danger"><i class="fa fa-times-circle"></i> {{ __('messages.error') }}
            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            <strong> {{ session('error') }}</strong>
        </div>
    </div>
@endif

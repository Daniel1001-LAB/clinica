@if ($message = Session::get('success'))
<div class="container-sm mt-4" id="alert">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{__('notification')}}: </strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
</div>

@endif


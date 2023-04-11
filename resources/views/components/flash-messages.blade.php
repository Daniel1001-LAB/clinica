@if ($message = Session::get('success'))
<div class="container-sm mt-4" id="alert">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-bell"></i>
        <strong>{{__('notification')}}: </strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
</div>

@endif

@if ($message = Session::get('fail'))
<div class="container-sm mt-4" id="alert">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-bell"></i>
        <strong>{{__('notification')}}: </strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
</div>

@endif


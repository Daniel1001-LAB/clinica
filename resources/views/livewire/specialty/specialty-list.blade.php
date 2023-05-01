<div class="">
    <div class="list-group  rounded-lg shadow">
        @foreach ($specialties as $specialty )
        <li class="list-group-item list-group-item-action text-capitalize p">
        <i class="fa-solid fa-user-doctor me-3"></i>{{ $specialty->name }}</li>
        @endforeach
      </div>
</div>

<div>
    <div class="list-group  rounded-lg shadow">
        @foreach (auth()->user()->socials as $social )
        <li class="list-group-item list-group-item-action text-capitalize p">
        <i class="{{$social->icon}}"></i>{{ $social->name }}</li>
        @endforeach
      </div>
</div>

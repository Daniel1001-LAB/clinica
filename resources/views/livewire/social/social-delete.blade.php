<div >
    <div class="list-group  rounded-lg shadow">
        @foreach (auth()->user()->socials as $social )
        <li class="list-group-item list-group-item-action text-capitalize p">

            <a wire:click="delete({{$social->id}})" class="link-dark link-underline link-underline-opacity-0 flex justify-between cursor-pointer items-center">
                <span><i class="{{$social->type}}" style="color: {{$social->color}}"></i></span>
                {{ $social->name }}<i class="fa-solid fa-eraser" style="color: #ff0000;"></i>
            </a>
        </li>

        @endforeach
      </div>
</div>

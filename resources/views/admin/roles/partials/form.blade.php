@csrf

<div class="mb-4 ">
    <x-label  for="name" class="fst-italic my-2 capitalize" value="{{ __('name of role') }}"></x-label>
    <x-input class="form-control" type="text" name="name"  placeholder="{{__('input name of role')}}" value="{{ old('name', $role->name) }}"></x-input>
    <x-input-error for="name"></x-input-error>
</div>
<button class="btn btn-outline-info " type="submit">
   {{__($btn)}}
</button>
<a class="btn btn-outline-danger " type="button" href="{{ route('roles.index')}}">
    {{__('cancel')}}
 </a>


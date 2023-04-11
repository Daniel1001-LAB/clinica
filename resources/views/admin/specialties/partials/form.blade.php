@csrf

<div class="mb-4 ">
    <x-label  for="name" class="fst-italic my-2 capitalize" value="{{ __('name of specialty') }}"></x-label>
    <x-input class="form-control" type="text" name="name"  placeholder="{{__('input name of specialty')}}" value="{{ old('name', $specialty->name) }}"></x-input>
    <x-input-error for="name"></x-input-error>
</div>

<div class="mb-4 ">
    <x-label  for="description" class="fst-italic my-2 capitalize" value="{{ __('description of specialty') }}"></x-label>
    <textarea class="form-control" type="text" name="description" cols="3" rows="5"  placeholder="{{__('input description of specialty')}}"></textarea>
    <x-input-error for="description"></x-input-error>
</div>
<button class="btn btn-outline-info " type="submit">
   {{__($btn)}}
</button>
<a class="btn btn-outline-danger " type="button" href="{{ route('specialties.index')}}">
    {{__('cancel')}}
 </a>


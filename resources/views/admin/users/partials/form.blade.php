@csrf

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="mb-4 ">
                <x-label  for="name" class="fst-italic my-2 capitalize" value="{{ __('name of user') }}"></x-label>
                <x-input class="form-control" type="text" name="name"  placeholder="{{__('input name of user')}}" value="{{ old('name', $user->name) }}"></x-input>
                <x-input-error for="name"></x-input-error>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-4 ">
                <x-label  for="name" class="fst-italic my-2 capitalize" value="{{ __('email') }}"></x-label>
                <x-input class="form-control" type="text" name="name"  placeholder="{{__('input name of user')}}" value="{{ old('name', $user->email) }}"></x-input>
                <x-input-error for="name"></x-input-error>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-4 ">
                <x-label  for="name" class="fst-italic my-2 capitalize" value="{{ __('phone') }}"></x-label>
                <x-input class="form-control" type="text" name="name"  placeholder="{{__('input name of user')}}" value="{{ old('name', $user->phone) }}"></x-input>
                <x-input-error for="name"></x-input-error>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-4 ">
                <x-label  for="name" class="fst-italic my-2 capitalize" value="{{ __('email') }}"></x-label>
                <x-input class="form-control" type="text" name="name"  placeholder="{{__('input name of user')}}" value="{{ old('name', $user->email) }}"></x-input>
                <x-input-error for="name"></x-input-error>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-4 ">
                <x-label  for="name" class="fst-italic my-2 capitalize" value="{{ __('email') }}"></x-label>
                <x-input class="form-control" type="text" name="name"  placeholder="{{__('input name of user')}}" value="{{ old('name', $user->email) }}"></x-input>
                <x-input-error for="name"></x-input-error>
            </div>
        </div>
    </div>

</div>


<div class="mb-4 ">
    <x-label  for="name" class="fst-italic my-2 capitalize" value="{{ __('name of user') }}"></x-label>
    <x-input class="form-control" type="text" name="name"  placeholder="{{__('input name of user')}}" value="{{ old('name', $user->name) }}"></x-input>
    <x-input-error for="name"></x-input-error>
</div>


<button class="btn btn-outline-info " type="submit">
   {{__($btn)}}
</button>
<a class="btn btn-outline-danger " type="button" href="{{ route('users.index')}}">
    {{__('cancel')}}
 </a>


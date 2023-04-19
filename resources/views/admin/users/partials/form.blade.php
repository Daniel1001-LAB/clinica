@csrf

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class=" ">
                <img class="object-cover object-center h-48 w-96 rounded" src="{{ asset($user->profile_photo_url) }}" alt="{{ $user->name }}">
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-4 ">
                <x-label  for="name" class=" my-2 capitalize form-label" value="{{ __('name of user') }}"></x-label>
                <x-input readonly class="form-control" type="text" name="name"  placeholder="{{__('input name of user')}}" value="{{ old('name', $user->name) }}"></x-input>
                <x-input-error for="name"></x-input-error>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-4 ">
                <x-label  for="email" class="my-2 capitalize form-label" value="{{ __('email') }}"></x-label>
                <x-input readonly class="form-control" type="email" name="email"  placeholder="{{__('input email of user')}}" value="{{ old('name', $user->email) }}"></x-input>
                <x-input-error for="email"></x-input-error>
            </div>
        </div>

        <div class="col-md-3">
            <div class="mb-4 ">
                <x-label  for="phone" class=" my-2 capitalize form-label" value="{{ __('phone') }}"></x-label>
                <x-input readonly class="form-control" type="text" name="phone"  placeholder="{{__('input phone of user')}}" value="{{ old('name', $user->phone) }}"></x-input>
                <x-input-error for="phone"></x-input-error>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-4 ">
                <x-label  for="gender" class=" my-2 capitalize form-label" value="{{ __('gender') }}"></x-label>
                <x-input readonly class="form-control" type="text" name="gender"  placeholder="{{__('input gender of user')}}" value="{{ old('name', $user->gender) }}"></x-input>
                <x-input-error for="gender"></x-input-error>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-4 ">
                <x-label  for="birthdate" class=" my-2 capitalize form-label" value="{{ __('birthdate') }}"></x-label>
                <x-input readonly class="form-control" type="text" name="birthdate"  placeholder="{{__('input birthdate of user')}}" value="{{ old('name', $user->birthdate) }}"></x-input>
                <x-input-error for="birthdate"></x-input-error>
            </div>
        </div>


        <div class="col-md-3">
            <div class="mb-4 ">
                <x-label  for="role" class=" my-2 capitalize form-label" value="{{ __('role') }}"></x-label>
                <select name="role" class="form-select" id="role">
                    <option value="">{{__('no role')}}</option>
                    @foreach ($roles as $role )
                        <option value="{{$role->id}}" @if ($role->id == $userRoleId)
                        selected @endif>{{__($role->name)}}</option>
                    @endforeach
                </select>
                {{-- <x-input class="form-control" type="text" name="role"  placeholder="{{__('input role of user')}}" value="{{ old('name', $user->role) }}"></x-input> --}}
                <x-input-error for="role"></x-input-error>
            </div>
        </div>

        <div class="col-md-12">
            <div class="mb-4 ">
                <x-label  for="address" class=" my-2 capitalize form-label" value="{{ __('address') }}"></x-label>
                <x-input readonly class="form-control" type="text" name="address"  placeholder="{{__('input address of user')}}" value="{{ old('name', $user->address) }}"></x-input>
                <x-input-error for="address"></x-input-error>
            </div>
        </div>
    </div>

</div>


    <button type="submit" class=" btn btn-outline-warning d-inline-flex align-items-center">
        {{__($btn)}}
        <i class="ms-2 fa-solid fa-pen"></i>
    </button>
    <a type="button" href="{{ route('users.index')}}" class="btn btn-outline-danger d-inline-flex align-items-center" type="button">
        {{__('cancel')}}
        <i class="ms-2 fa-solid fa-xmark"></i>
    </a>




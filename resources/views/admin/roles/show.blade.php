<x-admin-layout>

    <div class="container-sm pt-4 col-6">
        <div class="card mb-3 text-dark bg-light  shadow-lg" >
            <div class="card-header font-bold text-2xl capitalize"><strong>{{ __($title) }}</div>
            <div class="card-body">

                <form action="{{route('roles.store')}}" method="POST">
                    <div class="mb-4 ">
                        <x-label  for="name" class="fst-italic my-2 capitalize" value="{{ __('name of role') }}"></x-label>
                        <x-input class="form-control" readonly id="name" type="text" name="name"  placeholder="{{__('input name of role')}}" value="{{ old('name', $role->name) }}"></x-input>
                        <x-input-error for="name"></x-input-error>
                    </div>
                    @include('admin.roles.partials.permissions')

                    <a class="btn btn-outline-info d-inline-flex align-items-center" type="button" href="{{ route('roles.index')}}">
                        {{__('back')}}
                        <i class="fa-solid fa-right-from-bracket ms-2"></i>
                     </a>
                </form>
            </div>
        </div>
    </div>


</x-admin-layout>

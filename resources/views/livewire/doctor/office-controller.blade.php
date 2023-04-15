<div>
    <div class="container-md mt-5  ">
        <div class="row ">
            <div class="col-md-12 p-3 shadow-lg">
                <div class="col-md-4 mb-3">
                    <button type="button" class="text-capitalize btn btn-primary d-inline-flex align-items-center"
                        title="{{ __('add new office') }}" wire:click="openAddModal">
                        {{ __('add new office') }}
                        <i class="ms-1 fa-solid fa-arrow-right-long"></i>
                    </button>
                </div>

                <section>

                    <div class="container">
                        <div class="row mb-3">
                            @foreach ($offices as $item)
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-3 ">
                                    <div class="card shadow-lg h-100" style="border: 1px solid #E1EBEE; border-radius: 1rem;">
                                        <img src="{{ asset('assets/undraw_location_search_re_ttoj.svg') }}"
                                            class="rounded card-img-top image-fluid p-8" width="80%" height="80%"
                                            alt="location">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->local }}</h5>
                                            <p class="card-text">{{ $item->address }}</p>
                                        </div>
                                        <ul class="list-group list-group-flush ">
                                            @if ($item->phone)
                                                <li
                                                    class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                                    <i class="fa-solid fa-phone me-1"></i>
                                                    <span class="text-truncate small">{{ $item->phone }}</span>
                                                </li>
                                            @endif

                                            @if ($item->mobil)
                                                <li
                                                    class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                                    <i class="fa-solid fa-mobile me-1"></i>
                                                    <span class="text-truncate small">{{ $item->mobil }}</span>
                                                </li>
                                            @endif

                                            @if ($item->email)
                                                <li
                                                    class="list-group-item btn btn-sm btn-outline-dark d-inline-flex align-items-center">
                                                    <i class="fa-solid fa-at me-1"></i>
                                                    <span class="text-truncate small">{{ $item->email }}</span>
                                                </li>
                                            @endif

                                        </ul>
                                        <div class="card-footer p-3" >
                                            <button class="btn btn-sm btn-outline-danger text-capitalize"  wire:click="openDeleteModal({{ $item->id }})">{{__('delete')}}</button>
                                            <button class="btn btn-sm btn-outline-success text-capitalize" wire:click="openEditModal({{ $item->id }})">{{__('edit')}}</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </section>

            </div>
        </div>
        @include('livewire.doctor.partials.addModal')
        @include('livewire.doctor.partials.editModal')
        @include('livewire.doctor.partials.deleteModal')

    </div>
</div>

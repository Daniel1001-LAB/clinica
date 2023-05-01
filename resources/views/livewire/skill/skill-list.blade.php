<section>
    @foreach ($skills as $skill)
        <div class="card border border-success mb-3 shadow-lg rounded border">
            <div class="card-header  d-flex">
                <div class="font-bold">
                    <h5>{{ $skill->title }}</h5>
                </div>
                <div class="ml-auto d-flex">
                    <a class="btn btn-warning rounded-circle p-2 lh-1 cursor-pointer" type="button"
                        wire:click="edit({{ $skill->id }})"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-danger rounded-circle p-2 lh-1 cursor-pointer" type="button"
                        wire:click="$emit('deleteSkill', {{ $skill->id }})"><i class="fa-solid fa-eraser"></i></a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">{{ Str::limit($skill->description, 50) }}</p>
                <a href="" class="font-bold"> {{ __('read more...') }}</a>
            </div>
            <div class="card-footer">

            </div>
        </div>
    @endforeach



    <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            <div class="row">
                <h2 class="text-center">{{ __('Add skill') }}</h2>
            </div>
            {{-- <img class="object-fit-fill" src="{{ asset('assets/banner1.png') }}"
                alt="{{ auth()->user()->name }}" style="height: 300px; width: 1500px; object-fit: cover;"> --}}
        </x-slot>
        <x-slot name="content">
            <div class="row">
                <div class="col-md-12 p-2 mb-3 shadow rounded" style="background-color: #E1EBEE">
                    <h6 class=" fw-bold text-capitalize">{{ __('name of doctor/ user:') }}<mark
                            class="ms-3 badge bg-primary text-wrap"> {{ auth()->user()->name }}</mark></h6>
                </div>
                <div class="col-md-6">
                    <div class="aseleccionar">

                        <h6 class=" fw-bold text-capitalize">{{ __('select specialty') }}</h6>
                        <hr>
                        <select class="form-select text-capitalize" aria-label="select specialty"
                            wire:model="specialty">
                            <option class="text-capitalize" value=""> {{ __('select specialty') }}</option>
                            @foreach ($specialties as $s)
                                <option class="text-capitalize" value="{{ __($s->id) }}">{{ __($s->name) }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="specialty"></x-input-error>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="seleccionadas">
                        <h6 class=" fw-bold text-capitalize">{{ __('title') }}</h6>
                        <hr>
                        <input wire:model="title" class="form-control" type="text" placeholder="title">
                        <x-input-error for="title"></x-input-error>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="seleccionadas">
                        <h6 class=" fw-bold text-capitalize">{{ __('description') }}</h6>
                        <hr>
                        <div class="form-floating">
                            <textarea wire:model="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">{{ __('description of your skills...') }}</label>
                        </div>
                        <x-input-error for="description"></x-input-error>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$set('openModal', false)" type="button"
                class=" btn btn-outline-danger me-3 d-inline-flex align-items-center text-capitalize"
                title="{{ __('cancel') }}">
                {{ __('cancel') }}
                <i class="fa-solid fa-x ms-2"></i>
            </button>

            <button type="submit" wire:click="update"
                class=" btn btn-outline-success me-3 d-inline-flex align-items-center text-capitalize">
                {{ __('update') }}
                <i class="fa-solid fa-check ms-2"></i>
            </button>

        </x-slot>

    </x-dialog-modal>
</section>

@push('script')
    <script>
        livewire.on('deleteSkill', skillId => {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                livewire.emitTo('skill.skill-list', 'delete', skillId)
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
        })

    </script>
@endpush

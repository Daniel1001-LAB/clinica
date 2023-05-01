<div class="row">
    <div class="col-md-12 p-3 shadow rounded mb-3 card_glass" >
        <h2 class="text-black">Buscar especialidad <i class="float fa-solid fa-magnifying-glass fa-xl"></i></h2>

        <input class="form-control  text-capitalize" wire:model="search" placeholder="{{ 'find specialty' }}"
            type="text">
    </div>
    @foreach ($specialties as $specialty)
        <div class="col-md-4 mb-3" >
            <div class="card_specialties shadow-lg rounded">
                <div class="card__image">
                    <img src="{{ asset('assets/virus/v' . random_int(0, 10) . '.jpg') }}" alt="{{ $specialty->name }}"
                        srcset="">
                </div>
                <div class="card__content">
                    <p class="card__title text-capitalize">{{ $specialty->name }}</p>
                    @foreach ($specialty->doctors as $doctor)
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ $doctor->profile_photo_url }}" alt="{{ $doctor->name }}"
                            style="width: 45px; height: 45px" class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">{{$doctor->name}}</p>
                            <p class="text-muted mb-0">{{$doctor->email}}</p>
                        </div>
                    </div>
                    @endforeach
                    <a class="card__button" href="#">Read More</a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="  d-flex justify-content-lg-end">
        {{ $specialties->links() }}
    </div>
</div>


<x-admin-layout>

    <div class="container-sm col-md-6 mt-10 ">
        <div class="card mb-3 shadow-lg">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{ asset('assets/alergia.jpg') }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body d-flex flex-column justify-content-center">
                <h4 class="text-black card-title text-capitalize">{{ __($specialty->name) }}</h4>
                <p class="card-text text-capitalize">{{ __($specialty->description) }}</p>
                <div class="mt-auto">
                  <a href="{{ route('specialties.index') }}" type="button" class="btn btn-outline-warning d-inline-flex align-items-center" title="{{ __('back') }}">
                    {{ __('Back') }}
                    <i class="ms-1 fa-solid fa-arrow-right-long"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



</x-admin-layout>

<x-doctor-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong class="text-capitalize">{{__('welcome')}}! </strong>{{__('this is your resume, in it, you can detail your specialties and skills as well as your contacts so that patients know how to contact you and so patients can know what you are capable of.')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <div class="col-md-12">

            </div>
        </div>

    </div>

    <div class="container p-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card h-100 shadow rounded ">
                    <img src="{{ asset('assets/undraw_doctor_kw-5-l.svg') }}"
                        class="shadow rounded  card-img-top img-fluid" style="width: 800px; height: 250px;"
                        alt="...">
                    <div class="card-body overflow-auto" style="max-height: 400px; overflow-y: scroll;">
                        <h5 class="card-title  font-bold text-capitalize">{{ __('specialties') }}</h5>
                        @livewire('specialty.specialty-create')

                        <hr>
                        @livewire('specialty.specialty-list')
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow rounded h-100">
                    <img src="{{ asset('assets/undraw_social_thinking_re_y8cc.svg') }}"
                        class="shadow rounded p-3 card-img-top img-fluid" style="width: 800px; height: 250px;"
                        alt="...">
                    <div class="card-body overflow-auto" style="max-height: 400px; overflow-y: scroll;" >
                        <h5 class="card-title font-bold text-capitalize">{{ __('socials') }}</h5>
                        @livewire('social.social-create')
                        <hr>
                        @livewire('social.social-delete')
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow rounded h-100">
                    <img src="{{ asset('assets/undraw_medicine_b-1-ol.svg') }}"
                        class="shadow rounded p-3 card-img-top img-fluid" style="width: 800px; height: 250px;"
                        alt="...">
                    <div class="card-body overflow-auto" style="max-height: 400px; overflow-y: scroll;" >
                        <h5 class="card-title font-bold text-capitalize">{{ __('skills') }}</h5>
                        @livewire('skill.skill-create')
                        <hr>
                        @livewire('skill.skill-list')
                    </div>
                </div>
            </div>

        </div>





    </div>
</x-doctor-layout>

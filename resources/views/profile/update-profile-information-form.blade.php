<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <x-input type="file" class="hidden" wire:model="photo" x-ref="photo"
                    x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                " />

                <label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-button primary flat icon="plus" class="mt-2 mr-2" type="button"
                    x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-button>

                @if ($this->user->profile_photo_path)
                    <x-button flat secondary icon="trash" type="button" class="mt-2"
                        wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            {{-- <x-label for="name" value="{{ __('Name') }}" /> --}}
            <x-input icon="user" label="{{ __('Name') }}" id="name" type="text" class="mt-1 block w-full"
                wire:model.defer="state.name" autocomplete="name" />
            {{-- <x-input-error for="name" class="mt-2" /> --}}
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            {{-- <x-label for="email" value="{{ __('Email') }}" /> --}}
            <x-input label="{{ __('Email') }}" right-icon="at-symbol" id="email" type="email"
                class="mt-1 block w-full" wire:model.defer="state.email" autocomplete="username" />
            {{-- <x-input-error for="email" class="mt-2" /> --}}

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <x-button type="submit"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </x-button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-4">
            {{-- <x-label for="address" value="{{ __('Address') }}" /> --}}
            <x-textarea icon="map" id="address" name="address" type="text" class="mt-1 block w-full"
                wire:model.defer="state.address" autocomplete="address" label="{{ __('address') }}"
                placeholder="{{ __('your specific address') }}" />
            {{-- <x-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address"
                autocomplete="address" /> --}}
            {{-- <x-input-error for="address" class="mt-2" /> --}}
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            {{-- <x-label for="phone" value="{{ __('Phone') }}" /> --}}
            <x-inputs.phone icon="phone" class="mt-1 block w-full" name="phone" id="phone"
                label="{{ __('Phone') }}" mask="['+504 (##) ####-####', '+504 (##) #####-####']" autocomplete="phone"
                wire:model.defer="state.phone" />
            {{-- <x-input-error for="phone" class="mt-2" /> --}}
            {{-- <x-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="state.phone"
                autocomplete="phone" />
            <x-input-error for="phone" class="mt-2" /> --}}
        </div>

        <!-- Gender -->
        <div class="col-span-6 sm:col-span-4 capitalize">
            {{-- <x-label for="gender" value="{{ __('Gender') }}" /> --}}
            <x-select id="gender" name="gender" label="{{ __('Gender') }}" placeholder="Select your gender"
                autocomplete="gender-name" wire:model.defer="state.gender">
                <x-select.option label="{{ __('male') }}" value="male" />
                <x-select.option label="{{ __('female') }}" value="female" />
                <x-select.option label="{{ __('other') }}" value="other" />
            </x-select>
            {{-- <x-input-error for="gender" class="mt-2" /> --}}

            {{-- <select id="gender" name="gender" autocomplete="gender-name" wire:model.defer="state.gender"
                autocomplete="gender"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                <option value="male">{{ __('male') }}</option>
                <option value="female">{{ __('female') }}</option>
                <option value="other">{{ __('other') }}</option>
            </select> --}}

        </div>


        <!-- Birthdate -->
        <div class="col-span-6 sm:col-span-4">
            <x-datetime-picker without-time class="mt-1 block w-full" name="birthdate" id="birthdate"
                label="{{ __('Birthdate') }}" placeholder="{{ __('Birthdate') }}" wire:model.defer="state.birthdate"
                autocomplete="birthdate" />
            <x-input-error for="birthdate" class="mt-2" />

            {{-- <x-label for="birthdate" value="{{ __('Birthdate') }}" />
            <x-input label="{{ __('Birthdate') }}" id="birthdate" type="date" class="mt-1 block w-full" wire:model.defer="state.birthdate"
                autocomplete="birthdate" />
            <x-input-error for="birthdate" class="mt-2" /> --}}
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button id="save" spinner="photo" type="submit" icon="check" primary label="{{ __('Save') }}"
            wire:loading.attr="disabled" wire:target="photo"></x-button>
    </x-slot>

</x-form-section>


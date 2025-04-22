<x-app-layout>

    <style>
        input:disabled {
            background: #eeeeef !important
        }

        button.bg-gray-800:disabled {
            background: #81868f !important;
            border-color: #81868f !important
        }

        button.bg-red-600:disabled {
            background: #d15656 !important;
        }

        input:disabled:hover, button:disabled:hover {
            cursor: no-drop
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="content-profile max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>
            @endif


            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>

    @role('admin')
        <script>
            const container = document.querySelector('.content-profile');

            container.querySelectorAll('input, button, select, textarea').forEach(el => {
                el.disabled = true;
            });
        </script>
    @endrole
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight animate__animated animate__fadeInDown">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <!-- Profile Overview -->
                <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white shadow-lg rounded-lg p-6 flex items-center space-x-6 animate__animated animate__fadeIn">
                    <!-- Profile Picture -->
                    <div class="flex-shrink-0">
                        <img class="h-20 w-20 rounded-full object-cover border-2 border-gray-300" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                    </div>
                    <!-- User Info -->
                    <div>
                        <h3 class="text-xl font-semibold">{{ Auth::user()->name }}</h3>
                        <p class="text-sm">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <!-- Update Profile Form -->
                <div class="bg-gray-300 text-gray-800 shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                    @livewire('profile.update-profile-information-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <!-- Update Password -->
                <div class="bg-gray-300 text-gray-800 shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <!-- Two-Factor Authentication -->
                <div class="bg-gray-300 text-gray-800 shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <!-- Logout Other Browser Sessions -->
            <div class="bg-gray-300 text-gray-800 shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <!-- Delete Account -->
                <div class="bg-gray-300 text-gray-800 shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

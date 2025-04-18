<!DOCTYPE html>
            <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />

                <title>{{ config('app.name', 'Laravel') }}</title>

                @vite(['resources/css/app.css', 'resources/js/app.js'])

                @livewireStyles
            </head>
            
            <body class="font-sans antialiased bg-gray-100">

            <!-- Top Navigation -->
            <nav class="bg-white shadow w-full">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}" class="text-lg font-bold text-gray-800">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        </div>

                        <!-- Right Side Dropdown -->
                        <div class="flex items-center space-x-4">

                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center text-sm font-medium text-gray-700 focus:outline-none">
                                    <img class="h-8 w-8 rounded-full object-cover mr-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    {{ Auth::user()->name }}
                                    <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <!-- Dropdown -->
                                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-md z-50">
                                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>

                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="min-h-screen flex">
                <!-- Sidebar -->
                <aside class="w-64 bg-gray-800 text-white flex-shrink-0">
                    <div class="p-4">
                         <ul class="mt-4 space-y-2">
                           @if (Auth::user() && Auth::user()->role === 'admin')
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        Analytics
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('adduser') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        User Management
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        Activity Logs
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        Reports
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user() && Auth::user()->role === 'doctor')
                                <li>
                                    <a href="{{ route('doctor.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        Analytics
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        Patients
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        Appointments
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user() && Auth::user()->role === 'receptionist')
                                <li>
                                    <a href="{{ route('receptionist.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        Receptionist Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        Appointments
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user() && Auth::user()->role === 'pharmacist')
                                <li>
                                    <a href="" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        Analytics
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        Prescriptions
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="block px-4 py-2 rounded hover:bg-gray-700">
                                        Inventory
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">
                                    Settings
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-gray-700">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </aside>

                <!-- Page Content -->
                <div class="flex-1">

                    <!-- Page Content -->
                    <main class="py-6">
                        {{ $slot }}
                    </main>
                </div>
            </div>

            @livewireScripts
            </body>
            </html>
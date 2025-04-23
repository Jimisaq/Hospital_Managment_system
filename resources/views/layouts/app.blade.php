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
    <div class="min-h-screen">
        <!-- Top Navigation -->
        <nav class="bg-white shadow">
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
                                  <div class="d-flex">
                                      <!-- Sidebar -->
                                      <aside class="bg-secondary text-white p-3" style="width: 250px; min-height: 100vh;">
                                          <ul class="nav flex-column">
                                              @if (Auth::user() && Auth::user()->role === 'admin')
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="{{ route('admin.dashboard') }}"><i class="bi bi-bar-chart"></i> Analytics</a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="{{ route('users') }}"><i class="bi bi-people"></i> User Management</a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="{{ route('recent.activities')}}"><i class="bi bi-clock-history"></i> Activity Logs</a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="{{ route('admin.reports') }}"><i class="bi bi-file-earmark-text"></i> Reports</a>
                                                  </li>
                                              @endif
                                              @if (Auth::user() && Auth::user()->role === 'doctor')
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="{{ route('doctor.dashboard') }}"><i class="bi bi-bar-chart"></i> Analytics</a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="#"><i class="bi bi-person-badge"></i> Patients</a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="#"><i class="bi bi-calendar-check"></i> Appointments</a>
                                                  </li>
                                              @endif
                                              @if (Auth::user() && Auth::user()->role === 'receptionist')
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="{{ route('receptionist.dashboard') }}"><i class="bi bi-speedometer"></i> Receptionist Dashboard</a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="#"><i class="bi bi-calendar-check"></i> Appointments</a>
                                                  </li>

                                              @endif
                                              @if (Auth::user() && Auth::user()->role === 'pharmacist')
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="#"><i class="bi bi-bar-chart"></i> Analytics</a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="#"><i class="bi bi-prescription"></i> Prescriptions</a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-white" href="#"><i class="bi bi-box-seam"></i> Inventory</a>
                                                  </li>
                                              @endif
                                              <li class="nav-item">
                                                  <a class="nav-link text-white" href="{{ route('user.profile', ['id' => Auth::user()->id]) }}">
                                                      <i class="bi bi-person-circle"></i> Profile
                                                  </a>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link text-white" href="#"><i class="bi bi-gear"></i> Settings</a>
                                              </li>
                                              <li class="nav-item">
                                                  <form method="POST" action="{{ route('logout') }}">
                                                      @csrf
                                                      <button type="submit" class="btn btn-link nav-link text-white"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                                  </form>
                                              </li>
                                          </ul>
                                      </aside>

                                      <!-- Page Content -->
                                      <main class="flex-grow-1 p-4">
                                          {{ $slot }}
                                      </main>
                                  </div>

                                  @livewireScripts
                                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldnv0O8r+4+1p1j9jUj9+8+1p1j9jUj9+8" crossorigin="anonymous"></script>
                              </body>
                              </html>

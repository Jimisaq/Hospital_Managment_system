<!DOCTYPE html>
                              <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
                              <head>
                                  <meta charset="utf-8" />
                                  <meta name="viewport" content="width=device-width, initial-scale=1" />
                                  <title>{{ config('app.name', 'Laravel') }}</title>

                                  @vite(['resources/css/app.css', 'resources/js/app.js'])
                                  @livewireStyles

                                  <!-- Bootstrap -->
                                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
                                  <!-- Bootstrap Icons -->
                                  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
{{--                                  Animated CSS--}}
                                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
{{--                                  font awesome--}}
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM8e+z5l5x5l5x5l5x5l5x5l5x5l5x5l5x5" crossorigin="anonymous">
                              </head>
                              <body class="font-sans antialiased bg-light">

                                  <!-- Top Navigation -->
                                  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow" style="position: sticky; top: 0; z-index: 100;">
                                      <div class="container-fluid">
                                          <a class="navbar-brand fw-bold text-primary" href="{{ route('dashboard') }}">
                                              <i class="bi bi-speedometer2"></i> {{ config('app.name', 'Laravel') }}
                                          </a>
                                          <div class="d-flex align-items-center">
                                              <div class="dropdown">
                                                  <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                      <img class="rounded-circle me-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" style="width: 30px; height: 30px;">
                                                      {{ Auth::user()->name }}
                                                  </button>
                                                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                                      <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="bi bi-person-circle"></i> Profile</a></li>
                                                      <li>
                                                          <form method="POST" action="{{ route('logout') }}">
                                                              @csrf
                                                              <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                                          </form>
                                                      </li>

                                                  </ul>
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

<x-app-layout>
                                                        {{-- Admin Dashboard --}}
                                                        <x-slot name="header">
                                                            <h2 class="font-semibold text-2xl text-gray-800 leading-tight animate__animated animate__fadeInDown">
                                                                <i class="fas fa-tachometer-alt mr-2"></i>{{ __('Admin Dashboard') }}
                                                            </h2>
                                                        </x-slot>

                                                        <div class="py-12">
                                                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                                                <!-- Analytics Cards -->
                                                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                                                    <!-- Total Users -->
                                                                    <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                                                                        <h3 class="text-lg font-semibold"><i class="fas fa-users mr-2"></i>Total Users</h3>
                                                                        <p class="text-4xl font-bold mt-2">{{ $totalUsers }}</p>
                                                                    </div>

                                                                    <!-- Admins -->
                                                                    <div class="bg-gradient-to-r from-green-500 to-green-700 text-white shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                                                                        <h3 class="text-lg font-semibold"><i class="fas fa-user-shield mr-2"></i>Admins</h3>
                                                                        <p class="text-4xl font-bold mt-2">{{ $admins }}</p>
                                                                    </div>

                                                                    <!-- Doctors -->
                                                                    <div class="bg-gradient-to-r from-purple-500 to-purple-700 text-white shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                                                                        <h3 class="text-lg font-semibold"><i class="fas fa-user-md mr-2"></i>Doctors</h3>
                                                                        <p class="text-4xl font-bold mt-2">{{ $doctors }}</p>
                                                                    </div>

                                                                    <!-- Receptionists -->
                                                                    <div class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                                                                        <h3 class="text-lg font-semibold"><i class="fas fa-concierge-bell mr-2"></i>Receptionists</h3>
                                                                        <p class="text-4xl font-bold mt-2">{{ $receptionists }}</p>
                                                                    </div>

                                                                    <!-- Total Patients -->
                                                                    <div class="bg-gradient-to-r from-red-500 to-red-700 text-white shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                                                                        <h3 class="text-lg font-semibold"><i class="fas fa-procedures mr-2"></i>Total Patients</h3>
                                                                        <p class="text-4xl font-bold mt-2">{{ $totalPatients }}</p>
                                                                    </div>

                                                                    <!-- Patients in the Last 7 Days -->
                                                                    <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                                                                        <h3 class="text-lg font-semibold"><i class="fas fa-calendar-alt mr-2"></i>Patients in the Last 7 Days</h3>
                                                                        <p class="text-4xl font-bold mt-2">{{ $patientsLast7Days }}</p>
                                                                    </div>
                                                                </div>

                                                                <!-- Additional Metrics -->
                                                                <div class="mt-10 space-y-6">
                                                                    <!-- Recent Activities -->
                                                                    <div class="bg-white shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                                                                        <div class="flex justify-between items-center">
                                                                            <h3 class="text-lg font-semibold text-gray-700"><i class="fas fa-history mr-2"></i>Recent Activities</h3>
                                                                            <a href="{{ route('recent.activities')}}" class="btn btn-primary btn-sm">
                                                                                <i class="fas fa-eye"></i> View More
                                                                            </a>

                                                                        </div>
                                                                        <ul class="list-disc pl-5 mt-2 text-gray-700">
                                                                            <table class="table table-striped table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Event</th>
                                                                                        <th>User</th>
                                                                                        <th>Date</th>
                                                                                        <th>Target</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach($recentActivities as $activity)
                                                                                        <tr>
                                                                                            <td>{{ ucfirst($activity->event) }}</td>
                                                                                            <td>{{ optional($activity->user)->name ?? 'System' }}</td>
                                                                                            <td>{{ $activity->created_at->format('d M Y, H:i') }}</td>
                                                                                            <td>{{ $activity->auditable_type ?? 'N/A' }}</td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>

                                                                        </ul>
                                                                    </div>

                                                                    <!-- Server Uptime -->
                                                                    <div class="bg-white shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                                                                        <h3 class="text-lg font-semibold text-gray-700"><i class="fas fa-server mr-2"></i>Server Uptime</h3>
                                                                        <p class="text-2xl font-bold text-gray-900 mt-2">{{ $serverUptime }}</p>
                                                                    </div>

                                                                    <!-- Database Queries -->
                                                                    <div class="bg-white shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                                                                        <h3 class="text-lg font-semibold text-gray-700"><i class="fas fa-database mr-2"></i>Database Queries</h3>
                                                                        <p class="text-2xl font-bold text-gray-900 mt-2">{{ $dbQueries }}</p>
                                                                    </div>

                                                                    <!-- Error Logs -->
                                                                    <div class="bg-white shadow-lg rounded-lg p-6 animate__animated animate__fadeIn">
                                                                        <div class="flex justify-between items-center">
                                                                            <h3 class="text-lg font-semibold text-gray-700"><i class="fas fa-exclamation-triangle mr-2"></i>Error Logs</h3>
                                                                            <a href="" class="btn btn-danger btn-sm">
                                                                                <i class="fas fa-info-circle"></i> Details
                                                                            </a>
                                                                        </div>
                                                                        <p class="text-2xl font-bold text-gray-900 mt-2">{{ $errorLogs }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </x-app-layout>

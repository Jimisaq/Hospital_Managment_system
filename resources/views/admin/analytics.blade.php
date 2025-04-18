<x-app-layout>
{{--    admin's dashboard--}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Analytics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Total Users -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalUsers }}</p>
                    </div>

                    <!-- Active Users -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700">Active Users</h3>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $activeUsers }}</p>
                    </div>

                    <!-- New Users This Month -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700">New Users This Month</h3>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $newUsers }}</p>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white shadow rounded-lg p-6 mt-8">
                    <h3 class="text-lg font-semibold text-gray-700">Recent Activity</h3>
                    <ul class="mt-4 space-y-2">
                        @foreach ($recentActivities as $activity)
                            <li class="text-gray-600">
                                {{ $activity }} - <span class="text-sm text-gray-500">{{ "10:15" }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- System Performance -->
                <div class="bg-white shadow rounded-lg p-6 mt-8">
                    <h3 class="text-lg font-semibold text-gray-700">System Performance</h3>
                    <div class="mt-4">
                        <p class="text-gray-600">Server Uptime: <span class="font-bold">{{ $serverUptime }}</span></p>
                        <p class="text-gray-600">Database Queries: <span class="font-bold">{{ $dbQueries }}</span></p>
                        <p class="text-gray-600">Error Logs: <span class="font-bold">{{ $errorLogs }}</span></p>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

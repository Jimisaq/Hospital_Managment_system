<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reports') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <h1>Reports</h1>
                    <p>Here you can view and manage reports.</p>

                    <!-- Reports Summary -->
                    <div class="mb-4">
                        <h3>Summary</h3>
                        <ul>
                            <li>Total Users: {{ $totalUsers }}</li>
                            <li>Total Patients: {{ $totalPatients }}</li>
                        </ul>
                    </div>

                    <!-- Recent Activities Table -->
                    <h3>Recent Activities</h3>
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Event</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Target</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentActivities as $activity)
                                <tr>
                                    <td>{{ ucfirst($activity->event) }}</td>
                                    <td>{{ optional($activity->user)->name ?? 'System' }}</td>
                                    <td>{{ $activity->created_at->format('d M Y, H:i') }}</td>
                                    <td>{{ $activity->auditable_type ?? 'N/A' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>

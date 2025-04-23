<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Activity Details') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">

                    <!-- Activity Details Card -->
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Activity Information</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Event:</strong> {{ ucfirst($activity->event) }}</p>
                            <p><strong>User:</strong> {{ optional($activity->user)->name ?? 'System' }}</p>
                            <p><strong>Date:</strong> {{ $activity->created_at->format('d M Y, H:i') }}</p>
                            <p><strong>Target:</strong> {{ $activity->auditable_type ?? 'N/A' }}</p>
                            <p><strong>Details:</strong> {{ $activity->old_values ? json_encode($activity->old_values) : 'No details available' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

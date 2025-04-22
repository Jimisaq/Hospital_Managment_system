{{-- resources/views/admin/doctor/medical_records.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medical Records for ') . $patient->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h1>Medical Records</h1>

                @if($medicalRecords->isEmpty())
                    <p>No medical records found for this patient.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Visit Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Symptoms</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Diagnosis</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($medicalRecords as $record)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($record->visit_date)->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $record->symptoms }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $record->diagnosis }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $record->notes }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <div class="mt-4">
                    <a href="{{ route('doctor.dashboard') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-block">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{-- resources/views/admin/doctor/home.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h1>Welcome, Doctor</h1>
                <p>You are logged in with doctor access.</p>

                <!-- Patient Search Form -->
                <form method="GET" action="{{ route('doctor.searchPatients') }}" class="mb-4">
                    <input type="text" name="query" placeholder="Search patients by name" class="border rounded px-2 py-1" value="{{ request('query') }}">
                    <button type="submit" class="bg-blue-500 text-white rounded px-3 py-1">Search</button>
                </form>

                <!-- Search Results -->
                @if(isset($patients))
                    <h2 class="font-semibold text-lg mt-4 mb-2">Search Results:</h2>
                    @if(count($patients) > 0)
                        <ul>
                            @foreach($patients as $patient)
                                <li>
                                    {{ $patient->name }} - {{ $patient->email }} - {{ $patient->phone }}
                                    <a href="{{ route('doctor.showDiagnosisForm', ['patientId' => $patient->id]) }}" class="ml-4 text-blue-600 hover:underline">Add Diagnosis</a>
                                    <a href="{{ route('doctor.showMedicalRecords', ['patientId' => $patient->id]) }}" class="ml-4 text-green-600 hover:underline">View Medical Records</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No patients found.</p>
                    @endif
                @endif

            </div>
        </div>
    </div>
</x-app-layout>

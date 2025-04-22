{{-- resources/views/admin/doctor/diagnosis_form.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Diagnosis for Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1>Patient: {{ $patient->name }} (ID: {{ $patient->id }})</h1>

                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('doctor.submitDiagnosisForm', ['patientId' => $patient->id]) }}">
                    @csrf

                    <div class="mb-4">
                        <label for="diagnosis" class="block font-medium text-sm text-gray-700">Diagnosis <span class="text-red-600">*</span></label>
                        <textarea id="diagnosis" name="diagnosis" rows="4" class="border rounded w-full px-3 py-2 @error('diagnosis') border-red-500 @enderror" required>{{ old('diagnosis') }}</textarea>
                        @error('diagnosis')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="prescriptions" class="block font-medium text-sm text-gray-700">Prescriptions (optional)</label>
                        <div id="prescriptions-container">
                            <div class="flex space-x-2 mb-2 prescription-row">
                                <select name="prescriptions[0][drug_id]" class="border rounded px-3 py-2 w-2/3" required>
                                    <option value="">-- Select Drug --</option>
                                    @foreach($drugs as $drug)
                                        <option value="{{ $drug->id }}">{{ $drug->drug_name }} (Stock: {{ $drug->quantity_in_stock }})</option>
                                    @endforeach
                                </select>
                                <input type="number" name="prescriptions[0][quantity]" min="1" placeholder="Quantity" class="border rounded px-3 py-2 w-1/6" required>
                                <input type="text" name="prescriptions[0][dosage]" placeholder="Dosage" class="border rounded px-3 py-2 w-1/6" >
                            </div>
                        </div>
                        <button type="button" id="add-prescription" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-1 px-3 rounded">Add More</button>
                        @error('prescriptions')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <script>
                        document.getElementById('add-prescription').addEventListener('click', function() {
                            const container = document.getElementById('prescriptions-container');
                            const index = container.children.length;
                            const newRow = document.createElement('div');
                            newRow.classList.add('flex', 'space-x-2', 'mb-2', 'prescription-row');
                            newRow.innerHTML = `
                                <select name="prescriptions[${index}][drug_id]" class="border rounded px-3 py-2 w-2/3" required>
                                    <option value="">-- Select Drug --</option>
                                    @foreach($drugs as $drug)
                                        <option value="{{ $drug->id }}">{{ $drug->drug_name }} (Stock: {{ $drug->quantity_in_stock }})</option>
                                    @endforeach
                                </select>
                                <input type="number" name="prescriptions[${index}][quantity]" min="1" placeholder="Quantity" class="border rounded px-3 py-2 w-1/6" required>
                                <input type="text" name="prescriptions[${index}][dosage]" placeholder="Dosage" class="border rounded px-3 py-2 w-1/6" >
                            `;
                            container.appendChild(newRow);
                        });
                    </script>

                    <div class="mb-4">
                        <label for="reference" class="block font-medium text-sm text-gray-700">Reference (optional)</label>
                        <select id="reference" name="reference" class="border rounded w-full px-3 py-2 @error('reference') border-red-500 @enderror">
                            <option value="" selected>-- Select Reference --</option>
                            <option value="lab" {{ old('reference') == 'lab' ? 'selected' : '' }}>Lab</option>
                            <option value="scan" {{ old('reference') == 'scan' ? 'selected' : '' }}>Scan</option>
                            <option value="x-ray" {{ old('reference') == 'x-ray' ? 'selected' : '' }}>X-Ray</option>
                        </select>
                        @error('reference')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-600 text-white rounded px-4 py-2 hover:bg-blue-700">Submit</button>
                        <a href="{{ route('doctor.dashboard') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

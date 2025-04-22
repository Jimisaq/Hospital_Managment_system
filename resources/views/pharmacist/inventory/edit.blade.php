{{-- resources/views/pharmacist/inventory/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Drug') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('pharmacist.inventory.update', $drug->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="drug_name" class="block text-gray-700 font-bold mb-2">Drug Name:</label>
                        <input type="text" name="drug_name" id="drug_name" value="{{ old('drug_name', $drug->drug_name) }}" class="w-full border rounded px-3 py-2" disabled>
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 font-bold mb-2">Category:</label>
                        <input type="text" name="category" id="category" value="{{ old('category', $drug->category) }}" class="w-full border rounded px-3 py-2 @error('category') border-red-500 @enderror">
                        @error('category')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="unit_price" class="block text-gray-700 font-bold mb-2">Unit Price:</label>
                        <input type="number" step="0.01" name="unit_price" id="unit_price" value="{{ old('unit_price', $drug->unit_price) }}" class="w-full border rounded px-3 py-2 @error('unit_price') border-red-500 @enderror">
                        @error('unit_price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="quantity_in_stock" class="block text-gray-700 font-bold mb-2">Quantity In Stock:</label>
                        <input type="number" name="quantity_in_stock" id="quantity_in_stock" value="{{ old('quantity_in_stock', $drug->quantity_in_stock) }}" class="w-full border rounded px-3 py-2 @error('quantity_in_stock') border-red-500 @enderror">
                        @error('quantity_in_stock')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="expiry_date" class="block text-gray-700 font-bold mb-2">Expiry Date:</label>
                        <input type="date" name="expiry_date" id="expiry_date" value="{{ old('expiry_date', $drug->expiry_date) }}" class="w-full border rounded px-3 py-2 @error('expiry_date') border-red-500 @enderror">
                        @error('expiry_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Drug
                        </button>
                        <a href="{{ route('pharmacist.inventory.index') }}" class="text-blue-600 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- resources/views/pharmacist/inventory/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pharmacist Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h1>Drug Inventory</h1>

                <a href="{{ route('pharmacist.inventory.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add New Drug</a>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if($lowStockDrugs->isNotEmpty())
                    <div class="mb-4 p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded">
                        <h3 class="font-bold mb-2">Low Stock Alerts</h3>
                        <ul>
                            @foreach($lowStockDrugs as $lowStockDrug)
                                <li>
                                    {{ $lowStockDrug->drug_name }} - Stock: {{ $lowStockDrug->quantity_in_stock }}
                                    <a href="{{ route('pharmacist.inventory.createPurchaseOrder', $lowStockDrug->id) }}" class="text-blue-600 hover:underline ml-2">Order More</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($purchaseOrders->isNotEmpty())
                    <div class="mb-4 p-4 bg-gray-100 border border-gray-300 rounded">
                        <h3 class="font-bold mb-2">Purchase Orders</h3>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Drug</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity Ordered</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($purchaseOrders as $order)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->drug->drug_name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->quantity_ordered }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($order->status) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form method="POST" action="{{ route('pharmacist.inventory.updatePurchaseOrderStatus', $order->id) }}" class="inline-block">
                                                @csrf
                                                <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1">
                                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="ordered" {{ $order->status === 'ordered' ? 'selected' : '' }}>Ordered</option>
                                                    <option value="received" {{ $order->status === 'received' ? 'selected' : '' }}>Received</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if($drugs->isEmpty())
                    <p>No drugs found in inventory.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Drug Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity In Stock</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expiry Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($drugs as $drug)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $drug->drug_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $drug->category }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($drug->unit_price, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $drug->quantity_in_stock }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $drug->expiry_date ? \Carbon\Carbon::parse($drug->expiry_date)->format('M d, Y') : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('pharmacist.inventory.edit', $drug->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>

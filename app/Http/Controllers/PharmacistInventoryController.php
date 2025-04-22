<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;

class PharmacistInventoryController extends Controller
{
    /**
     * Display a listing of the drugs in inventory.
     */
    public function index()
    {
        $drugs = Drug::all();
        return view('pharmacist.inventory.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new drug.
     */
    public function create()
    {
        return view('pharmacist.inventory.create');
    }

    /**
     * Store a newly created drug in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'drug_name' => 'required|string|unique:drugs,drug_name',
            'unit_price' => 'required|numeric|min:0',
            'quantity_in_stock' => 'required|integer|min:0',
            'category' => 'nullable|string',
            'expiry_date' => 'nullable|date',
        ]);

        Drug::create([
            'drug_name' => $request->input('drug_name'),
            'unit_price' => $request->input('unit_price'),
            'quantity_in_stock' => $request->input('quantity_in_stock'),
            'category' => $request->input('category'),
            'expiry_date' => $request->input('expiry_date'),
            'added_by' => auth()->id(),
        ]);

        return redirect()->route('pharmacist.inventory.index')->with('success', 'Drug added successfully.');
    }

    /**
     * Show the form for editing the specified drug.
     */
    public function edit($id)
    {
        $drug = Drug::findOrFail($id);
        return view('pharmacist.inventory.edit', compact('drug'));
    }

    /**
     * Update the specified drug in storage.
     */
    public function update(Request $request, $id)
    {
        $drug = Drug::findOrFail($id);

        $request->validate([
            'unit_price' => 'required|numeric|min:0',
            'quantity_in_stock' => 'required|integer|min:0',
            'category' => 'nullable|string',
            'expiry_date' => 'nullable|date',
        ]);

        $drug->unit_price = $request->input('unit_price');
        $drug->quantity_in_stock = $request->input('quantity_in_stock');
        $drug->category = $request->input('category');
        $drug->expiry_date = $request->input('expiry_date');
        $drug->save();

        return redirect()->route('pharmacist.inventory.index')->with('success', 'Drug quantity updated successfully.');
    }
}

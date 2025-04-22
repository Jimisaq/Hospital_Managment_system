<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Drug;
use Illuminate\Http\Request;

class PharmacistPrescriptionController extends Controller
{
    /**
     * Display a listing of pending prescriptions.
     */
    public function index()
    {
        $pendingPrescriptions = Prescription::where('status', 'pending')->with('drug', 'medicalRecord.patient')->get();
        return view('pharmacist.prescriptions.index', compact('pendingPrescriptions'));
    }

    /**
     * Approve a prescription and update drug stock.
     */
    public function approve($id)
    {
        $prescription = Prescription::findOrFail($id);
        $drug = Drug::findOrFail($prescription->drug_id);

        if ($drug->quantity_in_stock < $prescription->quantity) {
            return redirect()->back()->with('error', 'Insufficient stock to approve this prescription.');
        }

        $drug->quantity_in_stock -= $prescription->quantity;
        $drug->save();

        $prescription->status = 'approved';
        $prescription->save();

        // Check if stock is low and notify pharmacist (implementation depends on notification system)
        if ($drug->quantity_in_stock <= 10) {
            // TODO: Implement notification to pharmacist about low stock
        }

        return redirect()->back()->with('success', 'Prescription approved and stock updated.');
    }

    /**
     * Deny a prescription.
     */
    public function deny($id)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->status = 'denied';
        $prescription->save();

        return redirect()->back()->with('success', 'Prescription denied.');
    }
}

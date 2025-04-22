<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;

use App\Models\MedicalRecord;
use App\Models\Prescription;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctorsCount = User::where('role', 'doctor')->count();
    
        $doctors = User::where('role', 'doctor')->get();
    
        return view('admin.doctor.home', compact( 'doctors', 'pharmacists'));
    }

    /**
     * Search patients by name.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function searchPatients(Request $request)
    {
        $query = $request->input('query');

        $patients = Patient::where('name', 'LIKE', "%{$query}%")->get();

        return view('admin.doctor.home', compact('patients'));
    }

    /**
     * Show the diagnosis form for a patient.
     *
     * @param int $patientId
     * @return \Illuminate\Http\Response
     */
    public function showDiagnosisForm($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        return view('admin.doctor.diagnosis_form', compact('patient'));
    }

    /**
     * Handle the diagnosis form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $patientId
     * @return \Illuminate\Http\Response
     */
    public function submitDiagnosisForm(Request $request, $patientId)
    {
        $request->validate([
            'diagnosis' => 'required|string',
            'prescriptions' => 'nullable|string',
            'reference' => 'nullable|in:lab,scan,x-ray',
        ]);

        $patient = Patient::findOrFail($patientId);

        // Create or update medical record
        $medicalRecord = MedicalRecord::updateOrCreate(
            ['patient_id' => $patient->id],
            ['diagnosis' => $request->input('diagnosis'), 'reference' => $request->input('reference')]
        );

        // Create prescription if provided
        if ($request->filled('prescriptions')) {
            Prescription::create([
                'patient_id' => $patient->id,
                'prescription' => $request->input('prescriptions'),
            ]);
        }

        return redirect()->route('doctor.dashboard')->with('success', 'Medical record updated successfully.');
    }

    /**
     * Show medical records for a patient.
     *
     * @param int $patientId
     * @return \Illuminate\Http\Response
     */
    public function showMedicalRecords($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        $medicalRecords = MedicalRecord::where('patient_id', $patientId)
            ->orderBy('visit_date', 'desc')
            ->get();

        return view('admin.doctor.medical_records', compact('patient', 'medicalRecords'));
    }
}

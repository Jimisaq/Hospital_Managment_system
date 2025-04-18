<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\User;

class MedicalRecordsTableSeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::all();
        $doctors = User::where('role', 'doctor')->pluck('id');

        foreach ($patients as $patient) {
            MedicalRecord::create([
                'patient_id' => $patient->id,
                'doctor_id' => $doctors->random(),
                'visit_date' => now()->subDays(rand(1, 365)),
                'symptoms' => 'Headache, fever',
                'diagnosis' => 'Malaria',
                'notes' => 'Prescribed anti-malarial drugs.'
            ]);
        }
    }
}

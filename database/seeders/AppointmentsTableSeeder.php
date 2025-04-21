<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;

class AppointmentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::pluck('id');
        $doctors = User::where('role', 'doctor')->pluck('id');

        foreach ($patients as $patient_id) {
            Appointment::create([
                'patient_id' => $patient_id,
                'doctor_id' => $doctors->random(),
                'date' => now()->addDays(rand(1, 30)),
                'time' => now()->addHours(rand(1, 12))->format('H:i:s'),
                'note' => 'Routine check-up'
            ]);
        }
    }
}

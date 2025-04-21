<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prescription;
use App\Models\Drug;
use App\Models\MedicalRecord;

class PrescriptionsTableSeeder extends Seeder
{
    public function run(): void
    {
        $records = MedicalRecord::pluck('id');
        $drugs = Drug::pluck('id');

        foreach ($records as $record_id) {
            Prescription::create([
                'record_id' => $record_id,
                'drug_id' => $drugs->random(),
                'quantity' => rand(1, 5),
                'dosage' => '2 times a day',
                'instruction' => 'Take after meals'
            ]);
        }
    }
}


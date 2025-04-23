<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\User;

class InvoicesTableSeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::pluck('id');
        $users = User::pluck('id');

        foreach ($patients as $id) {
            $total = rand(20000, 100000);
            $paid = rand(0, $total);

            Invoice::create([
                'patient_id' => $id,
                'total_amount' => $total,
                'amount_paid' => $paid,
                'payment_method' => 'Cash',
                'payment_status' => $paid >= $total ? 'paid' : 'partial',
                'issued_by' => $users->random(),
                'issued_date' => now()->subDays(rand(1, 30)),
            ]);
        }
    }
}

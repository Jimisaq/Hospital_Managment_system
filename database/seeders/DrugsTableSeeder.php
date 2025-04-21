<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Drug;
use App\Models\User;

class DrugsTableSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = User::pluck('id');

        $drugs = [
            ['Paracetamol', 'Painkiller'],
            ['Amoxicillin', 'Antibiotic'],
            ['Ibuprofen', 'Anti-inflammatory'],
            ['Cetrizine', 'Antihistamine']
        ];

        foreach ($drugs as [$name, $category]) {
            Drug::create([
                'drug_name' => $name,
                'category' => $category,
                'unit_price' => rand(500, 3000),
                'quantity_in_stock' => rand(50, 200),
                'expiry_date' => now()->addMonths(rand(6, 24)),
                'added_by' => $userIds->random()
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AuditLog;
use App\Models\User;

class AuditLogsTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck('id');

        foreach (range(1, 50) as $i) {
            AuditLog::create([
                'user_id' => $users->random(),
                'action' => 'Logged in',
                'timestamp' => now()->subMinutes(rand(1, 1440))
            ]);
        }
    }
}

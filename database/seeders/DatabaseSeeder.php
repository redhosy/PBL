<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Buat super admin secara default
        User::create([
            'name' => 'Redho Septayudien',
            'email' => 'SuperAdmin@gmail.com', // Ganti dengan email super admin yang diinginkan
            'password' => Hash::make('#Redho99'), // Ganti dengan password super admin yang diinginkan
            'role' => 'super admin', // Sesuaikan dengan role yang Anda tetapkan untuk super admin
        ]);

        // Tampilkan informasi ketika seeder dijalankan
        $this->command->info('super admin created: admin@gmail.com');
    }
}

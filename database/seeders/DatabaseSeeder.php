<?php

namespace Database\Seeders;

use App\Models\MasterData\ConfigPayment;
use App\Models\MasterData\TypeUser;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            TypeUserSeeder::class,
            ConsultationSeeder::class,
            ConfigPaymentSeeder::class,
            SpecialistSeeder::class, // Menghapus tanda titik koma yang tidak perlu
        ]);
    }
}
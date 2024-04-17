<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterData\ConfigPayment;
use Illuminate\Support\Facades\DB;

class ConfigPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create data here
        $config_payment = [
            [
                'fee'       => '150000',
                'vat'       => '20', //vat is percentage
                'created_at'=> now(),
                'updated_at' => now(),
            ],
        ];

        //this array $config_payment will be insert to table
        DB::table('config_payment')->insert($config_payment);
    }
}
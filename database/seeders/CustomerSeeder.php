<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// database/seeders/CustomerSeeder.php
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create([
            'name' => 'Barz',
            'address' => 'Luyo Inabanga Bohol',
            'email' => 'gvirnie@gmail.com',
            'contact' => '09567330139',
        ]);
    }
}


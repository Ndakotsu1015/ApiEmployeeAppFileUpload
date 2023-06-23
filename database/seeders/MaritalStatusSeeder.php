<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maritalStatuses = [
            ['status' => 'Single'],
            ['status' => 'In a Relationship'],
            ['status' => 'Engaged'],
            ['status' => 'Married'],
            ['status' => 'Divorced'],
            ['status' => 'Widow'],


        ];

        MaritalStatus::insert($maritalStatuses);
    }
}

<?php

namespace Database\Seeders;

use App\Models\RequestDeclined;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestDeclinedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RequestDeclined::factory(5)->create();
    }
}

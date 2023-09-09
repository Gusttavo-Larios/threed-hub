<?php

namespace Database\Seeders;

use App\Models\RequestApproved;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestApprovedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RequestApproved::factory(5)->create();
    }
}

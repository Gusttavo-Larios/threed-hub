<?php

namespace Database\Seeders;

use App\Models\AssociationPostImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssociationPostImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssociationPostImage::factory(5)->create();
    }
}

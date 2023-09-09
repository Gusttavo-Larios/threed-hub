<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Client::factory(10)->create();
        $this->call([
            ClientSeeder::class,
            MaterialSeeder::class,
            RequestSeeder::class,
            EvaluatorSeeder::class,
            RequestDeclinedSeeder::class,
            RequestApprovedSeeder::class,
            AssociationPostImageSeeder::class
        ]);
    }
}

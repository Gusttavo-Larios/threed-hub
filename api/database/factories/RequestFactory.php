<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Solicitação',
            'description' => fake()->text(256),
            'justify' => fake()->text(128),
            'client_id' => Client::factory(),
            'material_id' => Material::factory(),
        ];
    }
}

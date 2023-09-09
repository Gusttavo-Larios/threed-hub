<?php

namespace Database\Factories;

use App\Models\Evaluator;
use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestDeclined>
 */
class RequestDeclinedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reason_refusal' => fake()->text(100),
            'request_id' => Request::factory(),
            'evaluator_id' => Evaluator::factory()
        ];
    }
}

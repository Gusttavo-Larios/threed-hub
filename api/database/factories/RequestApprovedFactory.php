<?php

namespace Database\Factories;

use App\Models\Evaluator;
use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestApproved>
 */
class RequestApprovedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prototype_delivery_date' => fake()->date(),
            'product_delivery_date' => null,
            'request_id' => Request::factory(),
            'evaluator_id' => Evaluator::factory()
        ];
    }
}

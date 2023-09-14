<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {

        return [
            'name' => fake()->name,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => fake()-> name(),
            'course' => fake()->randomElement(['BSIT', 'BSED', 'BSHM', 'BSN', 'BSCRIM', 'BSBA']),
            'year_level' => fake()->numberBetween(1, 4),
            'email' => fake()->unique()->safeEmail,
            'contact' => fake()->phoneNumber,
        ];
    }
}

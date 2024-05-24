<?php

namespace Database\Factories;

use App\Models\Counselor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CounselorFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name(),
            'contact' => $this->faker->phoneNumber,
            'specialty' => $this->faker->randomElement(['School and Career Counseling', 'Family Problem Counseling']),
            'availability' => true, // Default value for availability
        ];
    }
}

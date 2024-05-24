<?php

namespace Database\Factories;

use App\Models\Counselor;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'students_id' => fake()->randomElement(Student::pluck('id')),
        'counselors_id' => fake()->randomElement(Counselor::pluck('id')),
        'appointment_date' => fake()->dateTimeBetween('now', '+1 month'),
        'cancellation_info' => fake()->paragraph,
        'comment' => fake()->paragraph,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'class' => $this->faker->numberBetween(1,9),
            'admission_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'class_teacher_id' => $this->faker->numberBetween(1,9),
            'fees' => $this->faker->numberBetween(1000,10000),
            'status' => 1,
        ];
    }
}

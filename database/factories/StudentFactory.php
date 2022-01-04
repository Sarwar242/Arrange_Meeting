<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'roll' => '17CSE'.rand(2,50),
            'email' => $this->faker->unique()->safeEmail(),
            'session' => '2016-17',
            'address' => $this->faker->address(),
            'department_id' => 1,
            'batch_id' => 1,
        ];
    }
}

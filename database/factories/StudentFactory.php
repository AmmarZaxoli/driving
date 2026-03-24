<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'mother_name' => fake()->firstName(),
            'birthday' => fake()->date(),
            'location' => fake()->city(),
            'mobile_number' => '07504186624',
            'date_join' => fake()->date(),
            'date_dr_number' => fake()->optional()->date(),
            'invoice' => 'INV' . fake()->numberBetween(1000, 9999),
            'nationality_id' => 1,
            'coach_id' => 1,
            'number_car' => fake()->randomElement(['12A12345', '18B22331', '21C88991']),
            'typecar' => fake()->numberBetween(0, 1),
            'status' => 0,
            
        ];
    }

    // Learning student
    public function learning()
    {
        return $this->state(function (array $attributes) {
            $date_start = fake()->date(); // generate date_start here
            return [
                'learn' => 0,
                'date_start' => $date_start,
                'date_learn' => $date_start, // same as date_start
                'time' => fake()->time(),
                'time2' => fake()->time(),
                'dayoflearn' => fake()->randomElement([6, 12]),
            ];
        });
    }

    // Not learning student
    public function notLearning()
    {
        return $this->state(function (array $attributes) {
            return [
                'learn' => 1,
                'date_learn' => null,           // ONLY date_learn is NULL
                'time' => fake()->time(),       // still filled
                'time2' => null,
                'dayoflearn' => 0,
            ];
        });
    }
}

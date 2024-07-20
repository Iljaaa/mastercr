<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->optional()->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'birth_place' => $this->faker->city,
            'citizenship' => $this->faker->country,
            'relocation_ready' => $this->faker->boolean,
            'salary' => $this->faker->randomFloat(2, 30000, 100000),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'rating' => $this->faker->numberBetween(1, 10),

            'primary_connections' => $this->faker->boolean,
            'builder_kr_substations' => $this->faker->boolean,
            'builder_kr_lines' => $this->faker->boolean,
            'mounting_parts' => $this->faker->boolean,
            'rza' => $this->faker->boolean,
            'asuptp' => $this->faker->boolean,
            'askue' => $this->faker->boolean,
            'tm' => $this->faker->boolean,
            'ss' => $this->faker->boolean,
            'ktsb' => $this->faker->boolean,

            'experience_110kv' => $this->faker->sentence,
            'ready_to_work' => $this->faker->boolean,
        ];
    }
}

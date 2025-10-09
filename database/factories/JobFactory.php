<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $salaries = ['$50,000', '$60,000', '$70,000', '$80,000', '$90,000', '$100,000', '$110,000', '120,000', '$130,000', '$140,000', '$150,000'];
        return [
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomElement($salaries),
            'location' => $this->faker->city(),
            'schedule' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Internship']),
            'url' => $this->faker->url(),
            'featured' => $this->faker->boolean(20), // 20% chance of being featured
            'employer_id' => Employer::factory(),
        ];
    }
}

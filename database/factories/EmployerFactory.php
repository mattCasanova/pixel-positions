<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'logo' => fake()->imageUrl(100, 100, 'business', true, 'Faker'),
            'user_id' => User::factory(),
        ];
    }

    public function configure()
    {

        return $this->afterCreating(function (Employer $employer) {
            $tags = Tag::all();

            Job::factory()->count(rand(2, 5))->create([
                'employer_id' => $employer->id
            ])
            ->each(function (Job $job) use ($tags) {
                $job->tags()->attach($tags->random(rand(1, 3)));
            });
        });
    }
}

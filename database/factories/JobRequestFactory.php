<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobRequest>
 */
class JobRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1111, 9999),
            'location' => Arr::random(DB::table('towns')->pluck('name')->toArray()),
            'selected_job' => fake()->randomElement(['House Manager', 'Mama Fua', 'House Cleaner', 'Lawn and Garden', 'Shamba Boy', 'Construction Assistant', 'Hotel Attendant',]),
            'age' => fake()->randomElement(['18-23', '24-29', '30-35', '36-41', ' Above 42',]),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'have_work_experience' => fake()->randomElement(['YES', 'NO']),
            'region' => fake()->randomElement(['Coast Region', 'Central Kenya', 'Western Kenya', 'Nyanza Region', 'Rift Valley Region', 'Eastern Kenya', 'Nairobi Region', 'North Eastern Region',]),
            'education_level' => fake()->randomElement(['Primary Education', 'Secondary Education', 'Certificate Level', 'Diploma Level', 'Undergraduate Degree', 'Postgraduate Diploma', 'Master’s Degree', 'Doctorate (Ph.D.)',]),
            'other_jobs_dowable' => json_encode([
                fake()->randomElement(['House Manager', 'Mama Fua', 'House Cleaner']),
                fake()->randomElement(['Lawn and Garden', 'Shamba Boy', 'Construction Assistant']),
            ]),
            'how_to_do_job' => fake()->randomElement(['Part Time', 'Full Time']),
            'amount_willing_to_be_paid' => fake()->numberBetween(6000, 10000),
            'paymentSchedule' => fake()->randomElement(['Monthly', 'Weekly', 'Daily', 'Hourly']),
            'phoneNumber' => fake()->numberBetween(1000000000, 9000000000),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->unique()->safeEmail(),
            'isUsernameEmail' => fake()->boolean(),
            'username_verified_at' => now(),
            'image_url' => fake()->url(),
            'Bio' => fake()->paragraph(),
            'rating' => fake()->numberBetween(0,5),
            'phone_number' => fake()->numberBetween(100000000,9999999999),
            'second_phone_number' => fake()->numberBetween(100000000,9999999999),
            'email' => fake()->safeEmail(),
            'status' => fake()->randomElement(['Active','Inactive']),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

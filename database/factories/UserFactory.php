<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'nombre' => fake()->firstName(),
            'apellidos' => fake()->	lastName(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the model's email  should be student.
     */
    public function estudiante(): static
    {
        return $this->state(fn (array $attributes) => [
            'email' => $attributes['name'] . '@' . env('STUDENT_EMAIL_DOMAIN', 'student.com'),
        ]);
    }

    /**
     * Indicate that the model's email  should be teacher.
     */
    public function docente(): static
    {
        return $this->state(fn (array $attributes) => [
            'email' => $attributes['name'] . '@' . env('TEACHER_EMAIL_DOMAIN', 'teacher.com'),
        ]);
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SmtpServer>
 */
class SmtpServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transport' => 'smtp',
            'host' => fake()->domainName(),
            'port' => fake()->randomElement([25, 465, 587]), // Changed to randomElement
            'encryption' => fake()->randomElement(['none', 'ssl', 'tls']),
            'username' => fake()->safeEmail(),
            'password' => 'password',
            'timeout' => fake()->randomElement([null, 300, 600]),
            'auth_mode' => fake()->boolean(), // Simplified to boolean
            'active' => fake()->boolean(),
            'default' => false,
        ];
    }
}

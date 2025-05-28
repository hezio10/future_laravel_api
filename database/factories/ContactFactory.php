<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'notes' => fake()->paragraph(3, true),
            'birthdate' => fake()->date(),
            'image' => fake()->imageUrl(),
            'role' => fake()->words(1, true),
            'address_id' => Address::factory(),
            'company_id' => Company::factory(),
        ];
    }
}

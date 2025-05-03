<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\EmailLabel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Email>
 */
class EmailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'contact_id' => Contact::factory(),
            'label_id' => EmailLabel::factory(),
        ];
    }
}

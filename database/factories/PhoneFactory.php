<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\PhoneLabel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phone' => fake()->phoneNumber(),
            'prefix' => fake()->randomElement(['+1', '+44', '+55', '+258']),
            'flag_link' => fake()->imageUrl(32, 24, 'flags'),
            'contact_id' => Contact::factory(),
            'label_id' => PhoneLabel::factory(),
        ];        
    }
}

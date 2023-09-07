<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ConfirmOrder>
 */
class ConfirmOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'updated_at'=>now(),
            'created_at'=>now(),
            'description' => $this->faker->sentence(),
            'user_email' => $this->faker->email(),
            'name'=> $this->faker->name(),
            'status' => $this->faker->randomElement(['confirmed', 'pending', 'unconfirmed']), // Assuming you want one of these statuses
           
                        
        ];
    }
}

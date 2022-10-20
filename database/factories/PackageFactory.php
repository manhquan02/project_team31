<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'package_name' => fake()->name(),
            'subject_id' => rand(1,10),
            'avatar' => fake()->imageUrl(),
            'price' => rand(200000, 1000000),
            'price_sale' => rand(10,20),
            'into_price' => rand(200000, 1000000),
            'description' => $this->faker->text,
            'start_date' => '2022-10-15',
            'end_date' => '2022-12-15',
            'status' => 1,
            
        ];
    }
}
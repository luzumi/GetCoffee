<?php

namespace Database\Factories;

use App\Enums\CoffeeVarietyEnum;
use Illuminate\Database\Eloquent\Factories\Factory;


class CoffeeVarietyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coffee_variety' => $this->faker->randomElement(CoffeeVarietyEnum::cases()),
            'credits' => $this->faker->randint(4, 8) * 10
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\CoffeeVarietyEnum;
use App\Models\CoffeeCount;
use App\Models\Rfid_tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoffeeCountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CoffeeCount::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'tag_id' => $user->tag_id,
            'coffee_variety' => $this->faker->randomElement(CoffeeVarietyEnum::cases()),
        ];
    }
}

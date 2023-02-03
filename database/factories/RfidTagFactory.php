<?php

namespace Database\Factories;

use App\Models\Rfid_tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rfid_tag>
 */
class RfidTagFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rfid_tag::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tag_uid' => Str::random(10),
            'role' => $this->faker->randomElement(['vip', 'user']),
            'tag_active' => $this->faker->boolean(),
        ];
    }

}

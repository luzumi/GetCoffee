<?php

namespace Database\Factories;

use App\Models\Rfid_tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tag = Rfid_tag::factory()->create();
        return [
            'username' => $this->faker->userName(),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'tag_id' => $tag->id,
            'credits' => $this->faker->numberBetween(0, 500),
            'active' => $this->faker->boolean,
            'remarks' => $this->faker->sentence,
            'remember_token' => Str::random(10),
        ];
    }

}

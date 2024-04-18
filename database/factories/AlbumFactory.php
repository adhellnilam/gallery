<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Album::class;

    public function definition(): array
    {
        return [
            // 'user_id' => User::factory(),
            // 'name' => $this->faker->name,
            // 'date_column' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];

        // $user = User::inRandomOrder()->first();

        // return [
        //     'user_id' => $user->id,
        //     'name' => $faker->name,
        //     'date_column' => Carbon::now()->subDays(rand(1, 30)),
        // ];
    }
}

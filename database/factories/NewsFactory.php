<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(rand(4, 14)),
            'content' => $this->faker->text(rand(255, 999)),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}

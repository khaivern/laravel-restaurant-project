<?php

namespace Database\Factories;

use App\Models\FoodMenu;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodMenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FoodMenu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title' => $this->faker->text(10),
            'user_id' => $this->faker->numberBetween(0, 10),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(500, 500, 'cats'),
            'price' => $this->faker->numberBetween(30, 200),


        ];
    }
}

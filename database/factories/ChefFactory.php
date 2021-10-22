<?php

namespace Database\Factories;

use App\Models\Chef;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChefFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chef::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(10),
            'specialty' => $this->faker->text(15),
            'image' => $this->faker->imageUrl('500', '500', 'dogs'),
        ];
    }
}

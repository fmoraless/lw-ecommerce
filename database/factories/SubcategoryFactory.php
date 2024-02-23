<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'image' => $this->faker->imageUrl('public/storage/subcategories',640, 480, null, false)
            'image' => 'subcategories/'.$this->faker->image('public/storage/subcategories', 640, 480, null, false)
        ];
    }
}

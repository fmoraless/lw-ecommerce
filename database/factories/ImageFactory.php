<?php

namespace Database\Factories;

use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'url' => 'products/'.$this->faker->image('public/storage/products', 640, 480, 'animals', true, true, 'cats', false, 'png'),
            'url' => 'products/'.$this->faker->image('public/storage/products', 640, 480, null, false)
            //'url' => Image::image(storage_path().'/app/public/products', 640, 480, 'cats', false),

        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /* hay que indicarle la ruta donde queremos que se almacene la imagen
            * y las dimensiones como parametro extra
            */
            'image' => 'categories/'.$this->faker->image('storage/app/public', 640, 480, null, false)
        ];
    }
}

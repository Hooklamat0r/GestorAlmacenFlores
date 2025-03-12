<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'nombre' => 'BMW',
            'precio' => $this->faker->randomFloat(2, 5, 1000),
            'descripcion' => 'Funciona siempre muy bien',
            'imagen' => '',
            'categoria_id' => Categoria::factory(),
        ];
    }
}

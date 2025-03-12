<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        Categoria::factory()->create(); // Me crea la categoría
    }
}

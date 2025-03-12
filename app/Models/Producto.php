<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'precio', 'descripcion', 'imagen', 'categoria_id'];

    // Este metodo establece la relacion entre categoria y producto (los productos solo tienen 1 categoría, OneToMany)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

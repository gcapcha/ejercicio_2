<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'precio',
        'anyo'
    ];

    public function usuarioPedidoLibro()
    {
        return $this->hasOne(UsuarioPedidoLibro::class, 'libro_id');
    }

    public function libroAutores()
    {
        return $this->hasMany(LibroAutor::class, 'libro_id');
    }
}

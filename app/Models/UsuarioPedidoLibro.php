<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioPedidoLibro extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_pedido_id',
        'libro_id'
    ];
}

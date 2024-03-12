<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'pedido_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    const ESTADO_PROCESO = 1;
    const ESTADO_SOLICITADO = 2;
    const ESTADO_ENTREGADO = 3;

    protected $fillable = [
        'titulo',
        'precio'
    ];


    public function usuarioPedido()
    {
        return $this->hasOne(UsuarioPedido::class, 'pedido_id');
    }
}

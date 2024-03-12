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

    public function usuario()
    {
        $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function pedido()
    {
        $this->belongsTo(Pedido::class, 'pedido_id', 'id');
    }

    public function libros()
    {
        $this->hasMany(UsuarioPedidoLibro::class, 'usuario_pedido_id');
    }
}

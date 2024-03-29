<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroAutor extends Model
{
    use HasFactory;

    protected $table = 'libro_autor';
    public $timestamps = false;

    protected $fillable = [
        'libro_id',
        'autor_id'
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }
}

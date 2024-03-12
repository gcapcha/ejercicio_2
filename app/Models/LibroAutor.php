<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroAutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'libro_id',
        'autor_id'
    ];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    # Listar Libros
    public function index()
    {
        $libros = Libro::get();
        return $libros;
    }

    # Ver un libro
    public function show($id)
    {
        $libro = Libro::find($id);

        if (is_null($libro)) {
            return 'El libro buscado no existe';
        }

        return $libro;
    }

    # Crear un libro
    public function store(Request $request)
    {
        $params = $request->all();
        $libro = Libro::create([
            'titulo' => $params['tittle'],
            'precio' => $params['precio'],
            'anyo' => $params['anyo']
        ]);

        return $libro;
    }



}

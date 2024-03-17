<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\LibroAutor;
use App\Models\Autor;

class LibroController extends Controller
{
    # Listar Libros
    public function index()
    {
        $libros = Libro::with(['libroAutores'])->get();
        return $libros;
    }

    # Ver un libro
    public function show($id)
    {
        $libro = Libro::with(['libroAutores'])->find($id);

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

        #Acceder a atributos de variables
        /* (object) $variableA = [
            'atributoA' => 1
        ];
        $variableA['atributoA']; // Acceder en un arreglo
        $variableA->atributoA; // Acceder en un objeto
        */

        # Recorriendo el arreglo de autores
        if (isset($params['autores']) && is_array($params['autores'])) {
            foreach ($params['autores'] as $key => $autor) {
                if (isset($autor['id'])) {
                    LibroAutor::create([
                        'libro_id' => $libro->id,
                        'autor_id' => $autor['id']
                    ]);
                } else {
                    $autorObj = Autor::create([
                        'nombre' => $autor['nombre'],
                        'biografia' => $autor['biografia']
                    ]);

                    LibroAutor::create([
                        'libro_id' => $libro->id,
                        'autor_id' => $autorObj->id
                    ]);
                }
            }
        }

        return $libro;
    }

    # Actualizar libro
    public function update($id, Request $request)
    {
        $params = $request->all();
        $libro = Libro::find($id)->update([
            'titulo' => $params['tittle'],
            'precio' => $params['precio'],
            'anyo' => $params['anyo'],
        ]);

        return $libro ? 'El libro fue actualizado.': 'Error al actualizar.';
    }

    # Eliminar un libro
    public function destroy($id)
    {
        $libro = Libro::find($id)->delete();

        if ($libro) {
            return 'Libro eliminado.';
        } else {
            return 'No se pudo eliminar.';
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Producto;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        // Obtener todos los registros de la tabla 'bitacora'
        $producto = Producto::all();

        // Retornar la vista 'bitacora.index' y pasarle los datos
        return view('profile.inventario.producto', compact('producto'));
    }
}

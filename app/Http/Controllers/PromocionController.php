<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function index()
    {
        $promocion_producto = Promocion::all(); // Asume que tienes un modelo Bitacora
        return view('profile.promociones.promociones', compact('promocion_producto'));
        
    }
}

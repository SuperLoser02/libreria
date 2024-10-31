<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    // Obtiene todos los roles de la base de datos y los pasa a la vista.
    public function index()
    {
        $autores = Autor::all();
        return view('profile.autor.autor',compact('autores'));
    }

    // Muestra el formulario para registra un nuevo autor.
    public function create()
    {
     return view('profile.autor.FormAutores');
    }
   
    // Valida los datos del formulario y registra un nuevo autor en la base de datos.
    public function store(Request $request)
    {
        $request->validate([ 
            'Nombre' => 'required|string|max:60',
        ]);

        Autor::create($request->all());
        return redirect()->route('autor.index')->with('success', 'autor registrado exitosamente');
    }
   
    // Muestra los detalles de un autor específico. 
   public function show(int $autor){
    $autor=Autor::find($autor);
    if(!$autor){
       return redirect()->back()->with('error', 'autor no encontrado');  
    }
       return view('autor.show',compact('autor'));  
   }
   
   // Muestra el formulario para editar un autor específico.
   public function edit(int $autor){
    $autor=Autor::find($autor);    
   return view('profile.autor.autorEdit',compact('autor'));  
   }
  
   // Actualiza un Actualiza existente con los nuevos datos del formulario.  
   public function update(Request $request,int $autor){
    $autor =Autor::find($autor);   
    $request->validate([ 
      'Nombre' => 'required|string|max:60',
    ]);
    $autor->update($request->all());
    return redirect()->route('autor.index')->with('success', 'Autor modificado correctamente.');     
  }

   // Elimina un autor específico de la base de datos. 
   public function destroy(int $autor){
    $autor=Autor::find($autor);
    $autor->delete();
    return redirect()->route('autor.index')->with('success', 'autor eliminado exitosamente');
   } 

   public function createOrFindAutorReturnId(Request $nombre){
    $autor = Autor::where('nombre',$nombre)->first();
    if ($autor == null) {
        // Validación (opcional)
        $nombre->validate([ 
            'nombre' => 'required|string|max:60',
        ]);   

        // Crear un nuevo autor
        $autor = new Autor([ 
            'nombre' => 'required|string|max:60',
        ]);   
        $autor->save();
    }
    return $autor->id; 
 }
}
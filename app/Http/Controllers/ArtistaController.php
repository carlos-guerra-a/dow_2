<?php

namespace App\Http\Controllers;
use App\Models\Cuenta;
use App\Models\Perfil;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PublicarRequest; 




use Illuminate\Http\Request;

class ArtistaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }



    public function artistaHome($user)
{
    $cuenta = Cuenta::where('user', $user)->first();
    $imagenes = $cuenta->imagenes;

    return view('artista.index', compact('cuenta', 'imagenes'));
}




    public function publicar($user)
    {
        // Aquí puedes agregar la lógica necesaria para la vista de publicar
        return view('artista.publicar', compact('user'));
    }

    public function baneadas($user){
        $cuenta = Cuenta::where('user', $user)->first();
        $imagenes = $cuenta->imagenes;
        return view('artista.baneadas',compact('user','imagenes'));
    }

    public function mensaje($user){
        return view('artista.imagencargada',compact('user'));
    }

    public function subir(PublicarRequest $request, $user)
    {
        $imagen = $request->file('archivo');
        $titulo = $request->input('titulo');
        $timestamp = time();
    
        $nombre = $user . '_' . $timestamp . '.' . $imagen->getClientOriginalExtension();
    
        $path = $imagen->storeAs('public', $nombre);
    
        $imagen = new Imagen();
        $imagen->titulo = $titulo;
        $imagen->archivo = $nombre;
        $imagen->baneada = false;
        $imagen->motivo_ban = null;
        $imagen->cuenta_user = $user;
        $imagen->save();
        
        
        return redirect()->route('artista.imagencargada', ['user' => $user]);
    }
    
    public function eliminar($id)
    {
        $imagen = Imagen::findOrFail($id);

        // Eliminar el archivo físico de la imagen
        Storage::disk('public')->delete($imagen->archivo);


        // Eliminar la imagen de la base de datos
        $imagen->delete();

        return redirect()->back()->with('success', 'La imagen ha sido eliminada correctamente.');
    }


    public function editar(Request $request, $id)
        {
            $imagen = Imagen::findOrFail($id);
            $imagen->titulo = $request->input('nuevo_nombre');
            $imagen->save();

            return redirect()->back()->with('success', 'El nombre de la imagen ha sido cambiado correctamente.');
        }

  

}


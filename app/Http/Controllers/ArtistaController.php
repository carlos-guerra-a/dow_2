<?php

namespace App\Http\Controllers;
use App\Models\Cuenta;
use App\Models\Perfil;
use App\Models\Imagen;

use Illuminate\Http\Request;

class ArtistaController extends Controller
{
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

    public function baneadas(){
        return view('artista.baneadas');
    }

    public function mensaje($user){
        return view('artista.imagencargada',compact('user'));
    }

    public function subir(Request $request, $user)
    {
        $imagen = $request->file('archivo');
        $titulo = $request->input('titulo');
    
        $nombre = $user . '_' . $titulo . '.' . $imagen->getClientOriginalExtension();
    
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
    


}


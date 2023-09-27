<?php

namespace App\Http\Controllers;
use App\Models\Perfil;
use App\Models\Cuenta;
use App\Models\Imagen;
use App\Http\Requests\EditRequest; 
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }



    public function adminHome(){
        $perfiles = Perfil::all();
        $cuentas = Cuenta::all();
        $perfilActual = Perfil::findOrFail(auth()->user()->perfil_id);
        return view('admin.index',compact('perfiles','cuentas','perfilActual'));
    }

    
    public function borrarCuenta($user)
    {   
        $cuenta = Cuenta::findOrFail($user);
        $imagenes = Imagen::where('cuenta_user',$cuenta->user)->get();
        
        foreach ($imagenes as $imagen){

            $imagen->delete();
            Storage::disk('public')->delete($imagen->archivo);
        }
        
        
        $cuenta->delete();

        return redirect()->route('admin.home');
    }

    public function actualizar(EditRequest $request, $user)
    {
        $cuenta = Cuenta::where('user', $user)->firstOrFail();
        $cuenta->nombre = $request->input('nombre');
        $cuenta->apellido = $request->input('apellido');
        $cuenta->save();

        return redirect()->route('admin.home');
    }

    public function editar($user)
    {
        $cuenta = Cuenta::where('user', $user)->first();

        return view('admin.editar', compact('cuenta'));
    }

    public function banear(Request $request, $id)
{
        $imagen = Imagen::findOrFail($id);

        if ($imagen->baneada) {
            $imagen->baneada = 0;
            $imagen->motivo_ban = "";
        } else {
            $imagen->baneada = 1;
            $imagen->motivo_ban = $request->input('motivo');
        }

        $imagen->save();

    return redirect()->back();
}

}






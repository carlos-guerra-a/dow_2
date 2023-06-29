<?php

namespace App\Http\Controllers;
use App\Models\Perfil;
use App\Models\Cuenta;
use App\Models\Imagen;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminHome(){
        $perfiles = Perfil::all();
        $cuentas = Cuenta::all();
        $perfilActual = Perfil::findOrFail(auth()->user()->perfil_id);
        return view('admin.index',compact('perfiles','cuentas','perfilActual'));
    }

    
    public function borrarCuenta($user)
    {
        $cuenta = Cuenta::findOrFail($user);
        $cuenta->delete();

        return redirect()->route('admin.home');
    }

    public function actualizar(Request $request, $user)
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
        $imagen->Baneada = 1;
        $imagen->motivo_ban = $request->input('motivo');
        $imagen->save();

    return redirect()->back()->with('success', 'La imagen ha sido banada correctamente.');
}




}

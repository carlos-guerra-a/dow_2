<?php

namespace App\Http\Controllers;
use App\Models\Perfil;
use App\Models\Cuenta;
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


}

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

        return view('admin.index',compact('perfiles','cuentas'));
    }

    
    public function deleteCuenta($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        $cuenta->delete();

        // Opcionalmente, puedes redirigir a una página o realizar otras acciones después de la eliminación
    }


}

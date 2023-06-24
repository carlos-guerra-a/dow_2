<?php

namespace App\Http\Controllers;
use App\Models\Perfil;
use App\Models\Cuenta;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminHome(){

        return view('admin.home');
    }

    public function perfiles()
    {
        $perfiles = Perfil::all();

        return view('admin.perfiles', compact('perfiles'));
    }

    public function cuentas()
    {
        $cuentas = Cuenta::all();
        return view('admin.cuentas', compact('cuentas'));
    }



}

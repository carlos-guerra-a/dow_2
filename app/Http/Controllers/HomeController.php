<?php

namespace App\Http\Controllers;
use App\Models\Cuenta;
use App\Models\Imagen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexHome() {

        $cuentas = Cuenta::all();
        $imagenes = Imagen::all();
        return view('home.index', compact('cuentas', 'imagenes'));
    }

    public function crearCuenta(){
        return view('home.crear');
    }

    public function verLogin() {
        return view('home.login');
    }

}

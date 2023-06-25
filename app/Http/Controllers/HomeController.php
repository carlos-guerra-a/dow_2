<?php

namespace App\Http\Controllers;
use App\Models\Cuenta;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexHome() {

        $cuentas = Cuenta::all();

        return view('home.index', compact('cuentas'));
    }

    public function crearCuenta(){
        return view('home.crear');
    }

    public function verLogin() {
        return view('home.login');
    }

}

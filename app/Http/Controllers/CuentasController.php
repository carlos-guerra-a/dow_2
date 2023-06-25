<?php

namespace App\Http\Controllers;
use App\Models\Cuenta;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Gate;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    public function autenticar(Request $request)
{
    $user = $request->user;
    $password = $request->password;

    if (Auth::attempt(['user' => $user, 'password' => $password])) {
        $usuario = Auth::user();

        if ($usuario->perfil_id == 1) {
            return redirect()->route('admin.home');
        } elseif ($usuario->perfil_id == 2) {
            return redirect()->route('artista.home', ['user' => $user]);
        }
    }

    return back()->withErrors([
        'user' => 'Credenciales Incorrectas',
    ])->onlyInput('user');
}




    public function logout(){
        Auth::logout();
        return redirect()->route('home.index');
    }


    
}

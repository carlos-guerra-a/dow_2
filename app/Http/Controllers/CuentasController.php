<?php

namespace App\Http\Controllers;
use App\Models\Cuenta;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Gate;
use Illuminate\Http\Request;
use App\Http\Requests\CuentaRequest; 

class CuentasController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['autenticar','logout']);
    }

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
        'user' => 'La cuenta o contraseña no es correcta, vuelva a ingresar sus datos.',
    ])->onlyInput('user');
    }




    public function logout(){
        Auth::logout();
        return redirect()->route('index');
        }
    

    public function crearCuenta(CuentaRequest $request)
    {
        $user = $request->input('user');
        $password = $request->input('password');
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
    
        // Verificar si el usuario ya existe en la base de datos
        $existeUsuario = Cuenta::where('user', $user)->exists();
    
        if ($existeUsuario) {
            return back()->withErrors([
                'user' => 'Nombre de usuario ya está en uso',
            ])->withInput();
        }
    
        // Crear la nueva cuenta de artista
        $cuenta = new Cuenta();
        $cuenta->user = $user;
        $cuenta->password = Hash::make($password);
        $cuenta->nombre = $nombre;
        $cuenta->apellido = $apellido;
        $cuenta->perfil_id = 2; // ID del perfil de artista
        $cuenta->save();
           
    
        return redirect()->route('index');
    }
        


    




    
}

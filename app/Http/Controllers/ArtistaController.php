<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    public function artistaHome(){
        return view('artista.index');
    }

    public function publicar(){
        return view('artista.publicar');
    }

    public function baneadas(){
        return view('artista.baneadas');
    }

}

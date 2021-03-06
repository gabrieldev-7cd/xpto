<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Redirect;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = Usuarios:: get();
        return view('usuarios.list', ['usuarios' => $usuarios]);
    }

    public function registrar(){
        return view('usuarios.registrar');

    }

    public function add( Request $request ){
        $usuario = new Usuarios;
        $usuario = $usuario->create( $request->all() );
        return Redirect :: to('/usuarios_list');
    }

    public function edit($id) {
        $usuario = Usuarios::findOrFail( $id );
        return view('usuarios.registrar', ['usuarios' => $usuario]);
    }
    //
}

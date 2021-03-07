<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios;
use Redirect;
use Maatwebsite\Excel\Facades\Excel; //-> Excel Lib;
use App\Exports\UsuariosExport;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = DB :: table('usuarios')->simplePaginate(5);
        // dd($usuarios);

        // $usuarios = Usuarios:: get();
        return view('usuarios.list', ['usuarios' => $usuarios]);
    }

    public function registrar(){
        return view('usuarios.registrar');

    }

    public function add( Request $request ){
        $usuario = new Usuarios;
        $usuario = $usuario->create( $request->all() );
        return redirect('usuarios_list')->with('message',['type' => 'success', 'msg' => 'Usuário criado com sucesso!']);
        // return Redirect :: to('/usuarios_list');
    }

    public function edit($id) {
        $usuario = Usuarios::findOrFail( $id );
        return view('usuarios.registrar', ['usuarios' => $usuario]);
    }
    
    public function update($id, Request $request) {
        $usuario = Usuarios::findOrFail( $id );
        $usuario->update( $request->all() );
        return redirect('usuarios_list')->with('message',['type' => 'success', 'msg' => 'Usuário atualizado com sucesso!']);
        //poderia criar a mensagem de evento com flash data (abaixo);
        //$request->session()->flash('status', 'Task was successful!');
        // return Redirect :: to('/usuarios_list')->with(['notificaion' => $notification]);
    }

    public function delete($id) {
        $usuario = Usuarios::findOrFail( $id );
        $usuario->delete();
        return redirect('usuarios_list')->with('message',['type' => 'success', 'msg' => 'Usuário '.$usuario->nome.', deletado com sucesso!']);

    }

    public function export() 
    {
        return Excel::download(new UsuariosExport, 'users.xlsx');
    }

}

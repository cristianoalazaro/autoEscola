<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('painel-admin.index');
    }

    public function editar(Request $req, usuario $usuario){
        $usuario->nome = $req->nome;
        $usuario->cpf = $req->cpf;
        $usuario->usuario = $req->usuario;
        $usuario->senha = $req->senha;
        $usuario->save();
        return redirect()->route('admin.index');
    }
}

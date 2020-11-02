<?php

namespace App\Http\Controllers;

use App\Models\instrutore;
use Illuminate\Http\Request;

class CadInstrutoresController extends Controller
{
    public function index(){
        $tabela = instrutore::orderby('id','desc')->paginate();
        return view('painel-admin.instrutores.index',['itens'=>$tabela]);
    }

    public function create(){
        return view('painel-admin.instrutores.create');
    }

    public function insert(Request $req){
        $itens = instrutore::where('email','=',$req->email)->orwhere('cpf','=',$req->cpf)
        ->orwhere('credencial','=',$req->credencial)->count();
        if($itens > 0){
            echo "<script>window.alert('Registro já cadastrado!')</script>";
            return view('painel-admin.instrutores.create');
        }

        $tabela = new instrutore();
        $tabela->nome = $req->nome;
        $tabela->email = $req->email;
        $tabela->cpf = $req->cpf;
        $tabela->endereco = $req->endereco;
        $tabela->credencial = $req->credencial;
        $tabela->telefone = $req->telefone;
        $tabela->data = $req->data;
        $tabela->save();
        return redirect()->route('instrutores.index');
    }

    public function editar(instrutore $item){
        return view('painel-admin.instrutores.edit',['item'=>$item]);
    }

    public function edit(Request $req, instrutore $tabela){
        $itens = instrutore::where('email','=',$req->email)->orwhere('cpf','=',$req->cpf)
        ->orwhere('credencial','=',$req->credencial)->where('id','<>',$req->id)->count();
        if($itens > 0){
            echo "<script>window.alert('Registro já cadastrado!')</script>";
            return view('painel-admin.instrutores.edit');
        }

        $tabela->nome = $req->nome;
        $tabela->email = $req->email;
        $tabela->cpf = $req->cpf;
        $tabela->endereco = $req->endereco;
        $tabela->credencial = $req->credencial;
        $tabela->telefone = $req->telefone;
        $tabela->data = $req->data;
        $tabela->save();
        return redirect()->route('instrutores.index');
    }
}

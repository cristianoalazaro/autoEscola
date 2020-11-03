<?php

namespace App\Http\Controllers;

use App\Models\instrutore;
use App\Models\recepcionista;
use App\Models\usuario;
use Illuminate\Http\Request;

class RecepController extends Controller
{
    public function index(){
        $tabela = recepcionista::orderby('id','desc')->paginate();
        return view('painel-admin.recep.index',['itens'=>$tabela]);
    }

    public function create(){
        return view('painel-admin.recep.create');
    }

    public function insert(Request $req){
        $itens = recepcionista::where('email','=',$req->email)->orwhere('cpf','=',$req->cpf)->count();
        if($itens > 0){
            echo "<script>window.alert('Registro já cadastrado!')</script>";
            return view('painel-admin.recep.create');
        }

        $tabela = new recepcionista();
        $tabela->nome = $req->nome;
        $tabela->cpf = $req->cpf;
        $tabela->telefone = $req->telefone;
        $tabela->endereco = $req->endereco;
        $tabela->email = $req->email;

        $tabela2 = new usuario();
        $tabela2->nome = $req->nome;
        $tabela2->cpf = $req->cpf;
        $tabela2->usuario = $req->email;
        $tabela2->senha = '123';
        $tabela2->nivel = 'recep';

        $tabela->save();
        $tabela2->save();
        return redirect()->route('recep.index');
    }

    public function editar(recepcionista $item){
        return view('painel-admin.recep.edit',['item'=>$item]);
    }

    public function edit(Request $req, recepcionista $item){
        $oldCpf = $req->oldCpf;
        $oldEmail = $req->oldEmail;

        if($req->cpf !== $oldCpf){
            $itens = recepcionista::where('cpf','=',$req->cpf)->count();
            if($itens > 0){
                echo "<script>window.alert('CPF já cadastrado!')</script>";
                return view('painel-admin.recep.edit',['item'=>$item]);
            }
        }

        if ($req->email !== $oldEmail){
            $itens = recepcionista::where('email','=',$req->email)->count();
            if($itens > 0){
                echo "<script>window.alert('Email já cadastrado!')</script>";
                return view('painel-admin.recep.edit',['item'=>$item]);
            }
        }
  

        $item->nome = $req->nome;
        $item->email = $req->email;
        $item->cpf = $req->cpf;
        $item->endereco = $req->endereco;
        $item->telefone = $req->telefone;
        $item->save();
        return view('painel-admin.recep.edit',['item'=>$item]);
    }

    public function delete(recepcionista $item){
        $item->delete();
        return redirect()->route('recep.index');
    }

    public function modal($id){
        $item = recepcionista::orderby('id','desc')->paginate();
        return view('painel-admin.recep.index',['itens'=>$item, 'id'=>$id]);
    }
}

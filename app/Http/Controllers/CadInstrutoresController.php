<?php

namespace App\Http\Controllers;

use App\Models\instrutore;
use App\Models\usuario;
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

        $tabela2 = new usuario();
        $tabela2->nome = $req->nome;
        $tabela2->cpf = $req->cpf;
        $tabela2->usuario = $req->email;
        $tabela2->senha = '123';
        $tabela2->nivel = 'instrutor';

        $tabela->save();
        $tabela2->save();
        return redirect()->route('instrutores.index');
    }

    public function editar(instrutore $item){
        return view('painel-admin.instrutores.edit',['item'=>$item]);
    }

    public function edit(Request $req, instrutore $item){
        $oldCpf = $req->oldCpf;
        $oldCredencial = $req->oldCredencial;
        $oldEmail = $req->oldEmail;

        if($req->cpf !== $oldCpf){
            $itens = instrutore::where('cpf','=',$req->cpf)->count();
            if($itens > 0){
                echo "<script>window.alert('CPF já cadastrado!')</script>";
                return view('painel-admin.instrutores.edit',['item'=>$item]);
            }
        }

        if ($req->credencial !== $oldCredencial){
            $itens = instrutore::where('credencial','=',$req->credencial)->count();
            if($itens > 0){
                echo "<script>window.alert('Credencial já cadastrada!')</script>";
                return view('painel-admin.instrutores.edit',['item'=>$item]);
            }
        }

        if ($req->email !== $oldEmail){
            $itens = instrutore::where('email','=',$req->email)->count();
            if($itens > 0){
                echo "<script>window.alert('Email já cadastrado!')</script>";
                return view('painel-admin.instrutores.edit',['item'=>$item]);
            }
        }
  

        $item->nome = $req->nome;
        $item->email = $req->email;
        $item->cpf = $req->cpf;
        $item->endereco = $req->endereco;
        $item->credencial = $req->credencial;
        $item->telefone = $req->telefone;
        $item->data = $req->data;
        $item->save();
        return view('painel-admin.instrutores.edit',['item'=>$item]);
    }

    public function delete(instrutore $item){
        $item->delete();
        return redirect()->route('instrutores.index');
    }

    public function modal($id){
        $item = instrutore::orderby('id','desc')->paginate();
        return view('painel-admin.instrutores.index',['itens'=>$item, 'id'=>$id]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $tabela = categoria::orderby('id','desc')->paginate();
        return view('painel-admin.categorias.index',['itens'=>$tabela]);
    }

    public function create(){
        return view('painel-admin.categorias.create');
    }

    public function insert(Request $req){
        $itens = categoria::where('nome','=',$req->nome)->count();
        if($itens > 0){
            echo "<script>window.alert('Registro já cadastrado!')</script>";
            return view('painel-admin.categorias.create');
        }

        $tabela = new categoria();
        $tabela->nome = $req->nome;

        $tabela->save();
        return redirect()->route('categorias.index');
    }

    public function editar(categoria $item){
        return view('painel-admin.categorias.edit',['item'=>$item]);
    }

    public function edit(Request $req, categoria $item){
        $old = $req->old;

        if($req->nome !== $old){
            $itens = categoria::where('nome','=',$req->nome)->count();
            if($itens > 0){
                echo "<script>window.alert('Categoria já cadastrada!')</script>";
                return view('painel-admin.categorias.edit',['item'=>$item]);
            }
        }

        $item->nome = $req->nome;
        $item->save();
        return redirect()->route('categorias.index');
    }

    public function delete(categoria $item){
        $item->delete();
        return redirect()->route('categorias.index');
    }

    public function modal($id){
        $item = categoria::orderby('id','desc')->paginate();
        return view('painel-admin.categorias.index',['itens'=>$item, 'id'=>$id]);
    }
}

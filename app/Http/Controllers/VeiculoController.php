<?php

namespace App\Http\Controllers;

use App\Models\veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index(){
        $tabela = veiculo::orderby('id','desc')->paginate();
        return view('painel-admin.veiculos.index',['itens'=>$tabela]);
    }

    public function create(){
        return view('painel-admin.veiculos.create');
    }

    public function insert(Request $req){
        $itens = veiculo::where('placa','=',$req->placa)->count();
        if($itens > 0){
            echo "<script>window.alert('Veículo já cadastrado!')</script>";
            return view('painel-admin.veiculos.create');
        }

        $tabela = new veiculo();
        $tabela->placa = $req->placa;
        $tabela->categoria = $req->categoria;
        $tabela->km = $req->km;
        $tabela->cor = $req->cor;
        $tabela->marca = $req->marca;
        $tabela->ano = $req->ano;
        $tabela->data_revisao = $req->data;
        $tabela->modelo = $req->modelo;
        $tabela->instrutor = $req->instrutor;
        
        $tabela->save();
        return redirect()->route('veiculos.index');
    }

    public function editar(veiculo $item){
        return view('painel-admin.veiculos.edit',['item'=>$item]);
    }

    public function edit(Request $req, veiculo $item){
        $old = $req->old;

        if($req->placa !== $old){
            $itens = veiculo::where('placa','=',$req->placa)->count();
            if($itens > 0){
                echo "<script>window.alert('Veículo já cadastrada!')</script>";
                return view('painel-admin.veiculos.edit',['item'=>$item]);
            }
        }

        $item->placa = $req->placa;
        $item->categoria = $req->categoria;
        $item->km = $req->km;
        $item->cor = $req->cor;
        $item->marca = $req->marca;
        $item->ano = $req->ano;
        $item->data_revisao = $req->data;
        $item->modelo = $req->modelo;
        $item->instrutor = $req->instrutor;

        $item->save();
        return redirect()->route('veiculos.index');
    }

    public function delete(veiculo $item){
        $item->delete();
        return redirect()->route('veiculos.index');
    }

    public function modal($id){
        $item = veiculo::orderby('id','desc')->paginate();
        return view('painel-admin.veiculos.index',['itens'=>$item, 'id'=>$id]);
    }
}

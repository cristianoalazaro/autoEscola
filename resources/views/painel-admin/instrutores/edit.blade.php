@extends('template.painel-admin');
@section('title','Editar Instrutores')
@section('content')

<h6 class="mb-4">EDIÇÃO DE INSTRUTORES</h6>
<hr/>
<form action="{{route('instrutores.edit',$item)}} " method="POST">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{$item->nome}}" 
                required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$item->email}}" 
            required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{$item->cpf}} " 
                required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="exampleInputEmail">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" 
                value="{{$item->endereco}} " required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" 
                value="{{$item->telefone}} " required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail">Credencial</label>
                <input type="text" class="form-control" id="credencial" name="credencial" 
                value="{{$item->credencial}} " required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail">Vencimento Credencial</label>
                <input type="date" class="form-control" id="data" name="data" value="{{$item->data}} " required>
            </div>
        </div>
    </div>

    <p align="right">
    <button type="submit" class="btn btn-primary">Salvar</button>
    </p>
</form>

@endsection
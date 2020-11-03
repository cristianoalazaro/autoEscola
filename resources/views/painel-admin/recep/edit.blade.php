@extends('template.painel-admin');
@section('title','Editar Recepcionistas')
@section('content')

<h6 class="mb-4">EDIÇÃO DE RECEPCIONISTAS</h6>
<hr/>
<form action="{{route('recep.edit',$item)}} " method="POST">
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

    <p align="right">

    <input type="hidden" name="oldCpf" value="{{$item->cpf}}">
    <input type="hidden" name="oldEmail" value="{{$item->email}}">

    <button type="submit" class="btn btn-primary">Salvar</button>
    </p>
</form>

@endsection
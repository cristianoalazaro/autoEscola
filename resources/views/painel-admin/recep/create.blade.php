@extends('template.painel-admin');
@section('title','Cadastrar Recepcionistas')
@section('content')

<h6 class="mb-4">CADASTRO DE RECEPCIONISTAS</h6>
<hr/>
<form action="{{route('recep.insert')}} " method="POST">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="exampleInputEmail">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
        </div>
    </div>

    <p align="right">
    <button type="submit" class="btn btn-primary">Salvar</button>
    </p>
</form>

@endsection
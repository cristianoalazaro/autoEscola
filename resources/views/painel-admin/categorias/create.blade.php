@extends('template.painel-admin');
@section('title','Cadastrar Categorias')
@section('content')

<h6 class="mb-4">CADASTRO DE CATEGORIAS</h6>
<hr/>
<form action="{{route('categorias.insert')}} " method="POST">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>

</form>

@endsection
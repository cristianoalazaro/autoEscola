@extends('template.painel-admin');
@section('title', 'Editar Categorias')
@section('content')

    <h6 class="mb-4">EDIÇÃO DE CATEGORIAS</h6>
    <hr />
    <form action="{{ route('categorias.edit', $item) }} " method="POST">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $item->nome }}" required>
                    <input type="hidden" name="old" value="{{ $item->nome }}">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>



        </div>

    </form>

@endsection

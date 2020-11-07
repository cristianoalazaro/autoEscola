@extends('template.painel-admin');
@section('title', 'Cadastrar Veículos')
@section('content')

    <h6 class="mb-4">CADASTRO DE VEÍCULOS</h6>
    <hr />
    <form action="{{ route('veiculos.insert') }} " method="POST">
        @csrf

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail">Placa</label>
                    <input type="text" class="form-control" id="placa" name="placa" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail">Categoria</label>
                    <select class="form-control" name="categoria" id="categoria">
                        <?php
                        use App\Models\categoria;
                        $tabela = categoria::all();
                        ?>
                        @foreach ($tabela as $item)
                            <option value="{{ $item->nome }}">{{ $item->nome }}</option>
                        @endForeach
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail">Km</label>
                    <input type="text" class="form-control" id="km" name="km" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail">Cor</label>
                    <input type="text" class="form-control" id="cor" name="cor" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail">Ano</label>
                    <input type="text" class="form-control" id="ano" name="ano" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail">Instrutor</label>
                    <select class="form-control" name="instrutor" id="instrutor">
                        <option value="0">Selecionar instrutor</option>
                        <?php
                        use App\Models\instrutore;
                        $tabela = instrutore::all();
                        ?>
                        @foreach ($tabela as $item)
                            <option value="{{$item->id}}">{{$item->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail">Última Revisão</label>
                    <input type="date" class="form-control" id="data" name="data" 
                    value="<?php echo date('Y-m-d') ?>" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        </div>

    </form>

@endsection

@extends('template.painel-admin');
@section('title', 'Editar Veículos')
@section('content')

    <h6 class="mb-4">EDIÇÃO DE VEÍCULOS</h6>
    <hr />
    <form action="{{ route('veiculos.edit', $item) }} " method="POST">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail">Placa</label>
                    <input type="text" class="form-control" id="placa" name="placa" value="{{ $item->placa }}" required>
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

                        <option value="{{ $item->categoria }}">{{ $item->categoria }}</option>
                        @foreach ($tabela as $val)
                            <?php if ($item->categoria != $val->nome): ?>
                            <option value="{{ $val->nome }}">{{ $val->nome }}</option>
                            <?php endif ?>
                        @endforeach
                                                
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail">Km</label>
                    <input type="text" class="form-control" id="km" name="km" value="{{ $item->km }}" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail">Cor</label>
                    <input type="text" class="form-control" id="cor" name="cor" value="{{ $item->cor }}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="{{ $item->marca }}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $item->modelo }}" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail">Ano</label>
                    <input type="text" class="form-control" id="ano" name="ano" value="{{ $item->ano }}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail">Instrutor</label>
                    <select class="form-control" name="instrutor" id="instrutor">
                        <?php
                        use App\Models\instrutore;
                        $tabela = instrutore::all();
                        $instrutor = instrutore::where('id','=',$item->instrutor)->first();
                        if ($item->instrutor != '0'){
                            $instrutor = $instrutor->nome;
                        } else {
                            $instrutor = '0';
                        }

                        if ($item->instrutor != '0'): ?>
                            <option value="{{$item->instrutor}}">{{$instrutor}}</option>
                        <?php endif ?>
                        <option value="0">Selecionar instrutor</option>
                        @foreach ($tabela as $val)  
                        <?php if ($item->instrutor != $val->id): ?>
                            <option value="{{ $val->id }}">{{ $val->nome }}</option>
                        <?php endif ?>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail">Última Revisão</label>
                    <input type="date" class="form-control" id="data" name="data" value="{{ $item->data_revisao }}"
                        required>
                </div>
            </div>
            <input type="hidden" name="old" value="{{ $item->placa }}">

            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>

@endsection

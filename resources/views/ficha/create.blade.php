@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Nova Ficha</h3>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops! </strong> there were some problems with your input.<br>
                <ul>
                    @foreach($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('ficha.store')}}" method="post">
            @csrf
            <div class="row">
                <input type="hidden" name="users_id" value="{{Auth::id()}}">
                <div class="col-md-12">
                    <strong>Paciente: </strong>
                    <select name="pacientes_id" class="form-control">
                        @foreach($pacientes as $paciente)
                            <option value="{{$paciente->id}}">{{$paciente->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Finalizado: </strong>
                    <select name="finalizado" class="form-control">
                        <option value="0">Não finalizado</option>
                        <option value="1">Finalizado</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Doença Base: </strong>
                    <select name="doenca_bases_id" class="form-control">
                        @foreach($doenca_bases as $doenca_base)
                            <option value="{{$doenca_base->id}}">{{$doenca_base->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Transfusão: </strong>
                    <select name="transfusaos_id" class="form-control">
                        @foreach($transfusaos as $transfusao)
                            <option value="{{$transfusao->id}}">{{$transfusao->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Gravidade: </strong>
                    <select name="gravidades_id" class="form-control">
                        @foreach($gravidades as $gravidade)
                            <option value="{{$gravidade->id}}">{{$gravidade->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Data da reação: </strong>
                    <input type="date" name="data_reacao" class="form-control">
                </div>
                <div class="col-md-12">
                    <strong>Descrição: </strong>
                    <input type="text" name="descricao" class="form-control" placeholder="Descrição">
                </div>
                <div class="col-md-12">
                    <strong>Pré Medicação: </strong>
                    <input type="text" name="pre_medicacao" class="form-control" placeholder="Pré Medicação">
                </div>
                <div class="col-md-12">
                    <strong>Reação Adversa: </strong>
                    <input type="text" name="reacao_adversa" class="form-control" placeholder="Reação Adversa">
                </div>
                <div class="col-md-12">
                    <strong>Indicações: </strong>
                    <input type="text" name="indicacao" class="form-control" placeholder="Indicações">
                </div>
                <div class="col-md-12">
                    <strong>Tipos Imediatas: </strong>
                    <select name="tipos_imediatas_id" class="form-control">
                        @foreach($tipos_imediatas as $tipos_imediata)
                            <option value="{{$tipos_imediata->id}}">{{$tipos_imediata->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <a href="{{route('ficha.index')}}" class="btn btn-sm btn-success">Voltar</a>
                    <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
                </div>
            </div>
        </form>

    </div>
@endsection

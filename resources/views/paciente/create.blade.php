@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Novo Paciente</h3>
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

        <form action="{{route('paciente.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <strong>Nome do Paciente: </strong>
                    <input type="text" name="nome" class="form-control" placeholder="Nome do Paciente">
                </div>
                <div class="col-md-12">
                    <strong>SUS: </strong>
                    <input type="text" name="sus" class="form-control" placeholder="SUS">
                </div>
                <div class="col-md-12">
                    <strong>Sexo: </strong>
                    <select name="sexo" class="form-control">
                        <option value="1">Masculino</option>
                        <option value="2">Feminino</option>
                        <option value="3">Não binário</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <strong>Raça: </strong>
                    <input type="text" name="raca" class="form-control" placeholder="Raça">
                </div>
                <div class="col-md-12">
                    <strong>Profissão: </strong>
                    <input type="text" name="profissao" class="form-control" placeholder="Profissão">
                </div>
                <div class="col-md-12">
                    <strong>Nome da mãe: </strong>
                    <input type="text" name="mae" class="form-control" placeholder="Nome da mãe">
                </div>
                <div class="col-md-12">
                    <strong>RG: </strong>
                    <input type="text" name="rg" class="form-control" placeholder="RG">
                </div>
                <div class="col-md-12">
                    <strong>Data de Nascimento: </strong>
                    <input type="date" name="data_nascimento" class="form-control">
                </div>
                <div class="col-md-12">
                    <a href="{{route('paciente.index')}}" class="btn btn-sm btn-success">Voltar</a>
                    <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
                </div>
            </div>
        </form>

    </div>
@endsection

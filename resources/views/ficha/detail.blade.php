@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h3>Detalhes da Paciente</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Usuário responsável: </strong> {{$users->name}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Paciente: </strong> {{$pacientes->nome}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    @if($ficha->finalizado==1)
                        <strong>Ficha finalizada.</strong>
                    @else
                        <strong>Ficha não finalizada.</strong>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Transfusão: </strong> {{$transfusaos->nome}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Gravidade: </strong> {{$gravidades->nome}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Data da reação: </strong> {{$ficha->data_reacao->format('d/m/Y')}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Descrição: </strong> {{$ficha->descricao}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Pré-medicação: </strong> {{$ficha->pre_medicacao}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Reação Adversa: </strong> {{$ficha->reacao_adversa}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Indicações: </strong> {{$ficha->indicacao}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Tipos imediatos: </strong> {{$tipos_imediatas->nome}}
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{route('ficha.index')}}" class="btn btn-sm btn-success">Voltar</a>
            </div>
        </div>
    </div>
@endsection

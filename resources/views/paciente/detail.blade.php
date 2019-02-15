@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h3>Detalhes do Paciente</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nome: </strong> {{$paciente->nome}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>SUS: </strong> {{$paciente->sus}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Sexo: </strong>
                    @if($paciente->sexo==1)
                        Masculino
                    @elseif($paciente->sexo==2)
                        Feminino
                    @else
                        Não binário
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Raça: </strong> {{$paciente->raca}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Profissão: </strong> {{$paciente->profissao}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Mãe: </strong> {{$paciente->mae}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>RG: </strong> {{$paciente->rg}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Data de Nascimento: </strong> {{$paciente->data_nascimento}}
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{route('paciente.index')}}" class="btn btn-sm btn-success">Voltar</a>
            </div>
        </div>
    </div>
@endsection

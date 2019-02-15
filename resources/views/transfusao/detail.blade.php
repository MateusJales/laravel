@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h3>Detalhes da Transfusão</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nome: </strong> {{$transfusao->nome}}
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{route('transfusao.index')}}" class="btn btn-sm btn-success">Voltar</a>
            </div>
        </div>
    </div>
@endsection

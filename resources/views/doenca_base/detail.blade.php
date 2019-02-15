@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h3>Detalhes da Doença</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nome: </strong> {{$doenca_base->nome}}
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{route('doenca_base.index')}}" class="btn btn-sm btn-success">Voltar</a>
            </div>
        </div>
    </div>
@endsection

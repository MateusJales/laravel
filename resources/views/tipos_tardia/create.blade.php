@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Novo Tipo Tardio</h3>
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

        <form action="{{route('tipos_tardia.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <strong>Nome do Tipo Tardio: </strong>
                    <input type="text" name="nome" class="form-control" placeholder="Nome do Tipo Tardio">
                </div>
                <div class="col-md-12">
                    <a href="{{route('tipos_tardia.index')}}" class="btn btn-sm btn-success">Voltar</a>
                    <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
                </div>
            </div>
        </form>

    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Nova Gravidade</h3>
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

        {!! Form::open(['route' => 'gravidade.store']) !!}
        @csrf
        <div class="row">
            <div class="col-md-12">
                <strong>Nível da gravidade: </strong>
                {!! Form::text('nome', null, ['placeholder'=>'Nível da Gravidade','class'=>'form-control']) !!}
            </div>
            <div class="col-md-12">
                <a href="{{route('gravidade.index')}}" class="btn btn-sm btn-success">Voltar</a>
                {!! Form::submit('Enviar', ['class'=>'btn btn-sm btn-primary']); !!}
            </div>
        </div>
        {!! Form::close() !!}

    </div>
@endsection

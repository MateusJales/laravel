@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Pacientes</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-sucess" href="{{ route('paciente.create') }}">Cadastrar novo paciente</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <table class="table table-hover table-sm">
            <tr>
                <th width = "50px"><b>No.</b></th>
                <th width = "350px">Nome do Paciente</th>
                <th>SUS</th>
                <th>Sexo</th>
                <th>RG</th>
                <th>Data de Nascimento</th>
                <th width = "180px">Ação</th>
            </tr>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td><b>{{++$i}}.</b></td>
                    <td>{{$paciente->nome}}</td>
                    <td>{{$paciente->sus}}</td>
                    <td>
                        @if($paciente->sexo==1)
                            M
                        @elseif($paciente->sexo==2)
                            F
                        @else
                            NB
                        @endif
                    </td>
                    <td>{{$paciente->rg}}</td>
                    <td>{{$paciente->data_nascimento->format('d/m/Y')}}</td>
                    <td>
                        <form action="{{ route('paciente.destroy', $paciente->id) }}" method="post">
                            <a class="btn btn-sm btn-success" href="{{route('paciente.show', $paciente->id)}}">Show</a>
                            <a class="btn btn-sm btn-warning" href="{{route('paciente.edit', $paciente->id)}}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

{!! $pacientes->links() !!}
    </div>

@endsection

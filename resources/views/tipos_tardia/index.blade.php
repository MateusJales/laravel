@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Tipos Tardios</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-sucess" href="{{ route('tipos_tardia.create') }}">Cadastrar novo tipo tardio</a>
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
                <th width = "350px">Nome do Tipo Tardio</th>
                <th width = "180px">Ação</th>
            </tr>
            @foreach ($tipos_tardias as $tipos_tardia)
                <tr>
                    <td><b>{{++$i}}.</b></td>
                    <td>{{$tipos_tardia->nome}}</td>
                    <td>
                        <form action="{{ route('tipos_tardia.destroy', $tipos_tardia->id) }}" method="post">
                            <a class="btn btn-sm btn-success" href="{{route('tipos_tardia.show', $tipos_tardia->id)}}">Show</a>
                            <a class="btn btn-sm btn-warning" href="{{route('tipos_tardia.edit', $tipos_tardia->id)}}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $tipos_tardias->links() !!}
    </div>

@endsection

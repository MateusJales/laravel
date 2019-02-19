@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Gravidades</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-sucess" href="{{ route('gravidade.create') }}">Cadastrar nova gravidade</a>
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
                <th width = "350px">Nome da Gravidade</th>
                <th width = "180px">Ação</th>
            </tr>
            @foreach ($gravidades as $gravidade)
                <tr>
                    <td><b>{{++$i}}.</b></td>
                    <td>{{$gravidade->nome}}</td>
                    <td>
                        <form action="{{ route('gravidade.destroy', $gravidade->id) }}" method="post">
                            <a class="btn btn-sm btn-success" href="{{route('gravidade.show', $gravidade->id)}}">Show</a>
                            <a class="btn btn-sm btn-warning" href="{{route('gravidade.edit', $gravidade->id)}}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $gravidades->links() !!}
    </div>

@endsection

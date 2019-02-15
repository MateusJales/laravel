@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista da Fichas</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-sucess" href="{{ route('ficha.create') }}">Cadastrar nova Ficha</a>
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
                <th width = "350px">Descrição da Ficha</th>
                <th width = "180px">Ação</th>
            </tr>
            @foreach ($fichas as $ficha)
                <tr>
                    <td><b>{{++$i}}.</b></td>
                    <td>{{$ficha->descricao}}</td>
                    <td>
                        <form action="{{ route('ficha.destroy', $ficha->id) }}" method="post">
                            <a class="btn btn-sm btn-success" href="{{route('ficha.show', $ficha->id)}}">Show</a>
                            <a class="btn btn-sm btn-warning" href="{{route('ficha.edit', $ficha->id)}}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $fichas->links() !!}
    </div>

@endsection

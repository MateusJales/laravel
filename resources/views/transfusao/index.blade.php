@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Transfusões</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-sucess" href="{{ route('transfusao.create') }}">Cadastrar nova transfusão</a>
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
                <th width = "350px">Nome da Transfusão</th>
                <th width = "180px">Ação</th>
            </tr>
            @foreach ($transfusaos as $transfusao)
                <tr>
                    <td><b>{{++$i}}.</b></td>
                    <td>{{$transfusao->nome}}</td>
                    <td>
                        <form action="{{ route('transfusao.destroy', $transfusao->id) }}" method="post">
                            <a class="btn btn-sm btn-success" href="{{route('transfusao.show', $transfusao->id)}}">Show</a>
                            <a class="btn btn-sm btn-warning" href="{{route('transfusao.edit', $transfusao->id)}}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $transfusaos->links() !!}
    </div>

@endsection

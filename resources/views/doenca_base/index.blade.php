@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Doenças Base</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-sucess" href="{{ route('doenca_base.create') }}">Cadastrar nova doença base</a>
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
                <th width = "350px">Nome da Doença</th>
                <th width = "180px">Ação</th>
            </tr>
            @foreach ($doenca_bases as $doenca_base)
                <tr>
                    <td><b>{{++$i}}.</b></td>
                    <td>{{$doenca_base->nome}}</td>
                    <td>
                        <form action="{{ route('doenca_base.destroy', $doenca_base->id) }}" method="post">
                            <a class="btn btn-sm btn-success" href="{{route('doenca_base.show', $doenca_base->id)}}">Show</a>
                            <a class="btn btn-sm btn-warning" href="{{route('doenca_base.edit', $doenca_base->id)}}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $doenca_bases->links() !!}
    </div>

@endsection

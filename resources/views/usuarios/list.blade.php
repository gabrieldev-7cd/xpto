@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <a class="btn btn-primary" href="{{ url('usuarios/new') }}">Cadastrar novo usuário</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="text-center"> Lista dos usuários!!!!!</h1>

                    <table class="table">
                        <thead>
                            <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $u)
                            <tr class="text-center">
                            <th scope="row"> {{$u->id}} </th>
                            <td>{{ $u->nome }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                <a class="btn btn-success btn-sm">show</a>
                                <a href="usuarios/{{ $u->id }}/edit" class="btn btn-info btn-sm">Up</a>
                                <a class="btn btn-danger btn-sm">Del</a>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

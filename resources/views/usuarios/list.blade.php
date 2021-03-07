@extends('layouts.app')

@section('content')
<div id="app">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <a class="btn btn-primary" href="{{ url('usuarios/new') }}">Cadastrar novo usuário</a></div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-{{session('message')['type']}}" role="alert">
                            {{session('message')['msg']}} 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
                    @endif
                    <h1 class="text-center"> Listagem de usuarios</h1>
                    <p>Testar Excel abaixo</p>
                    <a href="{{ route('excel') }}">Gerar</a>
                    <div class="content">
                        <table class="table">
                            <thead>
                                <tr class="text-center mx-auto">
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                            <div class="container">
                                @foreach($usuarios as $u)
                                    <tr class="text-center">
                                    <th> {{$u->id}} </th>
                                    <td>{{ $u->nome }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td class="align-center">
                                        <div class="row align-center">
                                            <a class="btn btn-success btn-sm  ml-2">show</a>
                                            <a href="usuarios/{{ $u->id }}/edit" class="btn btn-info btn-sm ml-2">Up</a>
                                            <form action="usuarios/delete/{{ $u->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm ml-2" >Del</button>
                                            </form>
                                        </div>
                                    </td>
                                    </tr>
                                @endforeach
                            </div>
                            </tbody>
                        </table>
                    </div>
                        {{ $usuarios->links() }}
                 
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

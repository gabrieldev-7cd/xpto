@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a class="btn btn-primary" href="{{ url('/usuarios_list') }}">Back</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if( Request :: is('*/edit'))
                        <form action="{{ url('usuarios/update') }}/{{$usuarios->id}}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" name="nome" required class="form-control" value="{{ $usuarios->nome}}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" name="email" required class="form-control" value="{{ $usuarios->email }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    @else

                    <form action="{{ url('usuarios/add') }}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" name="nome" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" name="email" required class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-5 text-center">

        <img class="mb-4" src="images/logo.png" alt="" width="40%">

        <p class="lead">
            {{ session()->get('users_email') }}
            <a class="btn btn-secondary btn-sm" href="{{ route('logout') }}">Sair</a>
        </p>

        <hr>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">

            <div class="pull-right">
                <a class="btn btn-secondary btn-sm" href="{{ route('create') }}">Cadastrar Contato</a>
            </div>

            <br>

            <div id="message" class="alert" role="alert" style="display:none;"></div>

            <div class="table-responsive-md">
                <table class="table" id="tableContacts">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">E-mail</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($users as $user)

                            <tr>
                                <td align="center">#{{ $user->id }}</td>
                                <td align="center">
                                    <a href="details/{{ $user->username }}" title="Detalhes do usuário">
                                        {{ $user->username }}
                                    </a>
                                </td>
                                <td align="center">{{ $user->email }}</td>
                                <td align="center">
                                    <a href="edit/{{ $user->id }}" title="Editar registro">Editar</a>
                                    &nbsp;&nbsp; | &nbsp;&nbsp; 
                                    <a onclick="return confirm('Deseja realmente excluir este usuário?')" href="{{ route('trash', $user->id) }}" title="Apagar resgistro">Apagar</a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
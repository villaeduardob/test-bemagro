@extends('layouts.app')

@section('content')

<form class="form-signin" action="{{ route('store') }}" id="createForm" method="post" role="form">
    @csrf
    <img class="mb-4" src="images/logo.png" alt="" width="72%">

    <h4 class="mb-3 font-weight-normal">Cadastro de Usuários</h4>

    <div id="message" class="alert" role="alert" style="display:none;"></div>
    
    <input type="email" id="email" name="email" class="form-control mb-2" placeholder="E-mail" autocomplete="off" autofocus>

    <input type="text" id="username" name="username" class="form-control mb-2" placeholder="Usuário GitHub" autocomplete="off">
    
    <input type="password" id="password" name="password" class="form-control mb-2" placeholder="Senha">
    
    <button type="submit" class="btn btn-lg btn-block" id="btnForm">Cadastrar</button>

    <br>

    @if (session()->has('users_email'))
        <a href="{{ route('home') }}">Voltar a listagem</a>
    @else
        <a href="/">Voltar ao login</a>
    @endif

    <p class="mt-5 mb-3 text-muted">&copy; 2020 - Eduardo Barros Villa</p>
</form>

@endsection
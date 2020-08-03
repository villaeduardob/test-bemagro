@extends('layouts.app')

@section('content')

<form class="form-signin" action="{{ route('authenticate') }}" id="formLogin" method="post" role="form">
	@csrf
    <img class="mb-4" src="images/logo.png" alt="" width="72%">

    <div id="message" class="alert" role="alert" style="display:none;"></div>
    
    <input type="email" id="email" name="email" class="form-control mb-2" placeholder="E-mail" autocomplete="off" autofocus>
    
    <input type="password" id="password" name="password" class="form-control mb-2" placeholder="Senha">
    
    <button class="btn btn-lg btn-block" type="submit">Entrar</button>

    <br>

    <a href="{{ route('create') }}">Cadastrar novo usuário</a>

    <p class="mt-5 mb-3 text-muted">&copy; 2020 - Eduardo Barros Villa</p>
</form>

@endsection
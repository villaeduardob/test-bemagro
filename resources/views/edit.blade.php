@extends('layouts.app')

@section('content')

<form class="form-signin" action="{{ route('update', $row->id) }}" id="editForm" method="post" role="form">
    @csrf
    <img class="mb-4" src="images/logo.png" alt="" width="72%">

    <h4 class="mb-3 font-weight-normal">Editar Usuários #{{ $row->id }}</h4>

    <div id="message" class="alert" role="alert" style="display:none;"></div>
    
    <input type="email" id="email" name="email" class="form-control mb-2" placeholder="E-mail" autocomplete="off" value="{{ $row->email }}">

    <input type="text" id="username" name="username" class="form-control mb-2" placeholder="Usuário GitHub" autocomplete="off" value="{{ $row->username }}">
    
    <input type="password" id="password" name="password" class="form-control mb-2" placeholder="Senha">
    
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="id" value="{{ $row->id }}">
    <button type="submit" class="btn btn-lg btn-block" id="btnForm">Gravar</button>

    <br>

    <a href="{{ route('home') }}">Voltar a listagem</a>

    <p class="mt-5 mb-3 text-muted">&copy; 2020 - Eduardo Barros Villa</p>
</form>

@endsection
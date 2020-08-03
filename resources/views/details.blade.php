@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-5 text-center">

        <img class="mb-4" src="../images/logo.png" alt="" width="40%">

        <p class="lead">
            {{ session()->get('users_email') }}
            <a class="btn btn-sm" href="{{ route('logout') }}">Sair</a>
        </p>

        <hr>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            
            <table align="center" cellpadding="0" cellspacing="0" width="70%">
                <tr>
                    <td align="center" colspan="2" style="padding:0 0 15px;">
                        <h3>Dados do Usuário</h3>
                    </td>
                </tr>

                <tr>
                    <td align="center" rowspan="7" width="40%">
                        <img class="img-fluid" src="{{ $response->avatar_url }}" width="90%">
                    </td>
                    <td align="left" width="60%"><strong>Login:</strong> {{ $response->login }}</td>
                </tr>

                <tr>
                    <td align="left"><strong>ID:</strong> {{ $response->id }}</td>
                </tr>

                <tr>
                    <td align="left">
                        <strong>URL:</strong> 
                        <a href="{{ $response->html_url }}" target="_blank">
                            {{ $response->html_url }}
                        </a>
                    </td>
                </tr>

                <tr>
                    <td align="left"><strong>Nome:</strong> {{ $response->name }}</td>
                </tr>

                <tr>
                    <td align="left"><strong>Empresa:</strong> {{ $response->company }}</td>
                </tr>

                <tr>
                    <td align="left"><strong>Bio:</strong> {{ $response->bio }}</td>
                </tr>

                <tr>
                    <td align="left">
                        <strong>Blog:</strong> 
                        <a href="{{ $response->blog }}" target="_blank">
                            {{ $response->blog }}
                        </a>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="2" style="padding:45px 0 0;">
                        <h3>Localização</h3>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="2">
                    <iframe src="https://maps.google.com/maps?q={{ $response->location }}&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" style="width:100% !important;border:0;height:250px !important;" allowfullscreen=""></iframe>
                    </td>
                </tr>
            </table>

            <br>
            <br>
            <br>

            <div class="pull-right">
                <a class="btn btn-sm" href="{{ route('home') }}">Voltar a listagem</a>
            </div>

        </div>
    </div>
</div>

@endsection
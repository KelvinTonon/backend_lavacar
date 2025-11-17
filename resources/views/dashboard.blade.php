<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Lavacar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <body class="bg-light">
    @extends('layouts.app')

    @section('title', 'Dashboard')

    @section('content')
        <div class="card p-4 shadow-sm">
            <h2>Bem-vindo, {{ Auth::user()->name }}!</h2>
            <p>Aqui será o painel administrativo do Lavacar</p>
        </div>
    @endsection

    </body>
</html>

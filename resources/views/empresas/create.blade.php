@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Empresa</h1>

    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" required><br>

        <label>Endereço:</label>
        <input type="text" name="endereco" required><br>

        <label>Telefone:</label>
        <input type="text" name="telefone" required><br>

        <button type="submit">Salvar</button>
    </form>
</div>
@endsection

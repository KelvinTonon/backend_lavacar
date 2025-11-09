@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empresa</h1>

    <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome:</label>
        <input type="text" name="nome" value="{{ $empresa->nome }}" required><br>

        <label>Endereço:</label>
        <input type="text" name="endereco" value="{{ $empresa->endereco }}" required><br>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="{{ $empresa->telefone }}" required><br>

        <button type="submit">Atualizar</button>
    </form>
</div>
@endsection

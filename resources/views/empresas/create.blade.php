@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Nova Empresa</h2>

    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="CNPJ" class="form-label">CNPJ</label>
            <input type="text" name="CNPJ" id="CNPJ" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

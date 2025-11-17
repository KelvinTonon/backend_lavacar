@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Lista de Empresas</h2>

    <a href="{{ route('empresas.create') }}" class="btn btn-primary mb-3">Cadastrar Nova Empresa</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>CNPJ</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->nome }}</td>
                    <td>{{ $empresa->endereco }}</td>
                    <td>{{ $empresa->telefone }}</td>
                    <td>{{ $empresa->CNPJ }}</td>
                    <td>
                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

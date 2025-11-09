@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Empresas</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('empresas.create') }}">+ Nova Empresa</a>

    <table border="1" cellpadding="5" style="margin-top: 20px;">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>

        @foreach($empresas as $empresa)
        <tr>
            <td>{{ $empresa->id }}</td>
            <td>{{ $empresa->nome }}</td>
            <td>{{ $empresa->endereco }}</td>
            <td>{{ $empresa->telefone }}</td>
            <td>
                <a href="{{ route('empresas.edit', $empresa->id) }}">Editar</a>
                <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Excluir empresa?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

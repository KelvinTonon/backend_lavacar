@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Agendamentos</h2>
    <a href="{{ route('agendamentos.create') }}" class="btn btn-primary mb-3">Novo Agendamento</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Serviço</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendamentos as $ag)
            <tr>
                <td>{{ $ag->user->name }}</td>
                <td>{{ $ag->servico->nome }}</td>
                <td>{{ \Carbon\Carbon::parse($ag->data)->format('d/m/Y') }}</td>
                <td>{{ $ag->hora }}</td>
                <td>{{ ucfirst($ag->status) }}</td>
                <td>
                    <a href="{{ route('agendamentos.edit', $ag->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('agendamentos.destroy', $ag->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir este agendamento?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

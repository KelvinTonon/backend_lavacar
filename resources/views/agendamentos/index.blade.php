@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Agendamentos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('agendamentos.create') }}" class="btn btn-primary mb-3">Novo Agendamento</a>

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
            @forelse($agendamentos as $agendamento)
                <tr>
                    <td>{{ $agendamento->cliente }}</td>
                    <td>{{ $agendamento->servico }}</td>
                    <td>{{ \Carbon\Carbon::parse($agendamento->data)->format('d/m/Y') }}</td>
                    <td>{{ $agendamento->hora }}</td>
                    <td>{{ ucfirst($agendamento->status) }}</td>
                    <td>
                        <a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Nenhum agendamento encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Agendamento</h2>

    <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <input type="text" name="cliente" value="{{ $agendamento->cliente }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="servico" class="form-label">Serviço</label>
            <input type="text" name="servico" value="{{ $agendamento->servico }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" value="{{ $agendamento->data }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" value="{{ $agendamento->hora }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="pendente" {{ $agendamento->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="concluido" {{ $agendamento->status == 'concluido' ? 'selected' : '' }}>Concluído</option>
                <option value="cancelado" {{ $agendamento->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('agendamentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

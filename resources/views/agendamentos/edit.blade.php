@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Agendamento</h2>

    <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="servico_id" class="form-label">Serviço</label>
            <select name="servico_id" class="form-control" required>
                @foreach($servicos as $servico)
                    <option value="{{ $servico->id }}" {{ $agendamento->servico_id == $servico->id ? 'selected' : '' }}>
                        {{ $servico->nome }}
                    </option>
                @endforeach
            </select>
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
            <select name="status" class="form-control">
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

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Novo Agendamento</h2>

    <form action="{{ route('agendamentos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="servico_id" class="form-label">Serviço</label>
            <select name="servico_id" class="form-control" required>
                <option value="">Selecione...</option>
                @foreach($servicos as $servico)
                    <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('agendamentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

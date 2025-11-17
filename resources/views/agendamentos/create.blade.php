@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Novo Agendamento</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('agendamentos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <input type="text" name="cliente" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="servico" class="form-label">Serviço</label>
            <input type="text" name="servico" class="form-control" required>
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


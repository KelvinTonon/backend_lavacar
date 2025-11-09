@extends('layouts.app')

@section('title', 'Cadastrar Serviço')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Cadastrar Novo Serviço</h4>
    </div>

    <div class="card-body">
        {{-- Mensagem de erro de validação --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulário de criação --}}
        <form action="{{ route('servicos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome_servico" class="form-label">Nome do serviço</label>
                <input type="text" name="nome_servico" id="nome_servico" class="form-control" value="{{ old('nome_servico') }}" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3">{{ old('descricao') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço (R$)</label>
                <input type="number" name="preco" id="preco" class="form-control" step="0.01" value="{{ old('preco') }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
@endsection

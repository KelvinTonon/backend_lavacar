@extends('layouts.app')

@section('title', 'Editar Serviço')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-white">
        <h4 class="mb-0">Editar Serviço</h4>
    </div>

    <div class="card-body">
        {{-- Mensagens de erro de validação --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulário de edição --}}
        <form action="{{ route('servicos.update', $servico->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome_servico" class="form-label">Nome do Serviço</label>
                <input 
                    type="text" 
                    name="nome_servico" 
                    id="nome_servico" 
                    class="form-control" 
                    value="{{ old('nome_servico', $servico->nome_servico) }}" 
                    required
                >
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea 
                    name="descricao" 
                    id="descricao" 
                    class="form-control" 
                    rows="3"
                >{{ old('descricao', $servico->descricao) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço (R$)</label>
                <input 
                    type="number" 
                    step="0.01" 
                    name="preco" 
                    id="preco" 
                    class="form-control" 
                    value="{{ old('preco', $servico->preco) }}" 
                    required
                >
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </form>
    </div>
</div>
@endsection

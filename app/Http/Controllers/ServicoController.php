<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    // Listar todos os serviços
    public function index()
    {
        $servicos = Servico::all();
        return view('servicos.index', compact('servicos'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        return view('servicos.create');
    }

    // Salvar novo serviço no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome_servico' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
        ]);

        Servico::create($request->only(['nome_servico', 'descricao', 'preco']));

        return redirect()->route('servicos.index')
                         ->with('success', 'Serviço cadastrado com sucesso!');
    }

    // Mostrar formulário de edição
    public function edit($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servicos.edit', compact('servico'));
    }

    // Atualizar serviço
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_servico' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
        ]);

        $servico = Servico::findOrFail($id);
        $servico->update($request->only(['nome_servico', 'descricao', 'preco']));

        return redirect()->route('servicos.index')
                         ->with('success', 'Serviço atualizado com sucesso!');
    }

    // Excluir serviço
    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();

        return redirect()->route('servicos.index')
                         ->with('success', 'Serviço removido com sucesso!');
    }
}

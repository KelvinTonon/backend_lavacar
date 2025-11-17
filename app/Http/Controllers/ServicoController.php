<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    
    public function index()
    {
        $servicos = Servico::all();
        return view('servicos.index', compact('servicos'));
    }


    public function create()
    {
        return view('servicos.create');
    }

   
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

    
    public function edit($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servicos.edit', compact('servico'));
    }

    
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

   
    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();

        return redirect()->route('servicos.index')
                         ->with('success', 'Serviço removido com sucesso!');
    }
}

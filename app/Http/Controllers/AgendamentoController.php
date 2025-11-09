<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\servico;
use Illuminate\Support\Facades\Auth;

class AgendamentoController extends Controller
{
    // Listar todos os agendamentos
    public function index()
    {
        $agendamentos = Agendamento::with(['user', 'servico'])->get();
        return view('agendamentos.index', compact('agendamentos'));
    }

    // Formulário de criação
    public function create()
    {
        $servicos = Servico::all();
        return view('agendamentos.create', compact('servicos'));
    }

    // Salvar agendamento
    public function store(Request $request)
    {
        $request->validate([
            'servico_id' => 'required|exists:servicos,id',
            'data' => 'required|date',
            'hora' => 'required',
        ]);

        Agendamento::create([
            'user_id' => Auth::id(),
            'servico_id' => $request->servico_id,
            'data' => $request->data,
            'hora' => $request->hora,
            'status' => 'pendente',
        ]);

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso!');
    }

    // Editar agendamento
    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $servicos = Servico::all();

        return view('agendamentos.edit', compact('agendamento', 'servicos'));
    }

    // Atualizar agendamento
    public function update(Request $request, $id)
    {
        $request->validate([
            'servico_id' => 'required|exists:servicos,id',
            'data' => 'required|date',
            'hora' => 'required',
            'status' => 'required|string',
        ]);

        $agendamento = Agendamento::findOrFail($id);
        $agendamento->update($request->all());

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    // Excluir agendamento
    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento removido!');
    }
}

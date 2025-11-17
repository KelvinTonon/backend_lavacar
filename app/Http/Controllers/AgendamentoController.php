<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
        return view('agendamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'servico' => 'required|string|max:255',
            'data' => 'required|date',
            'hora' => 'required',
        ]);

        Agendamento::create([
            'cliente' => $request->cliente,
            'servico' => $request->servico,
            'data' => $request->data,
            'hora' => $request->hora,
            
        ]);

        return redirect()->route('agendamentos.index')
                         ->with('success', 'Agendamento criado com sucesso!');
    }

    public function edit(Agendamento $agendamento)
    {
        return view('agendamentos.edit', compact('agendamento'));
    }

    public function update(Request $request, Agendamento $agendamento)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'servico' => 'required|string|max:255',
            'data' => 'required|date',
            'hora' => 'required',
            
        ]);

        $agendamento->update([
            'cliente' => $request->cliente,
            'servico' => $request->servico,
            'data' => $request->data,
            'hora' => $request->hora,
            
        ]);

        return redirect()->route('agendamentos.index')
                         ->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();
        return redirect()->route('agendamentos.index')
                         ->with('success', 'Agendamento deletado com sucesso!');
    }
}

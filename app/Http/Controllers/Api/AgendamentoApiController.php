<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agendamento;
use Illuminate\Support\Facades\Auth;

class AgendamentoApiController extends Controller
{
    // Listar agendamentos 
    public function index()
    {
        $agendamentos = Agendamento::where('user_id', Auth::id())->get();
        return response()->json($agendamentos);
    }

    // Criar agendamento
    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'hora' => 'required',
            'descricao' => 'required|string|max:255',
        ]);

        $agendamento = Agendamento::create([
            'data' => $request->data,
            'hora' => $request->hora,
            'descricao' => $request->descricao,
            'user_id' => Auth::id()
        ]);

        return response()->json($agendamento, 201);
    }

    // Ver agendamento específico
    public function show($id)
    {
        $agendamento = Agendamento::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($agendamento);
    }

    
    public function destroy($id)
    {
        $agendamento = Agendamento::where('user_id', Auth::id())->findOrFail($id);
        $agendamento->delete();

        return response()->json(['message' => 'Agendamento removido com sucesso']);
    }
}

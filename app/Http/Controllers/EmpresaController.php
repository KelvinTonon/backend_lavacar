<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empresa;

class EmpresaController extends Controller
{
    public function index(){
        $empresas = Empresa::all();
        return view('empresas.index',compact('empresas'));
    }

    public function create(){
        return view('empresas.create');

    }
    public function store(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
        ]);

        Empresa::create($request->all());

        return redirect()->route('empresas.index');
    }

    public function edit(Empresa $empresa){
        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, Empresa $empresa){
        $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
        ]);

        $empresa->update($request->all());

        return redirect()->route('empresas.index');
    }

    public function destroy(Empresa $empresa){
        $empresa->delete();
        return redirect()->route('empresas.index');
    }
}

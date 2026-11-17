<?php
namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::orderBy('id', 'asc')->get();
        return view('equipamentos.index', compact('equipamentos'));
    }

    public function create()
    {
        return view('equipamentos.create');
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|min:5|max:100',
            'categoria' => 'required',
            'localizacao' => 'required|min:5|max:100',
            'status' => 'required'
        ]);

        Equipamento::create($dadosValidados);

        return redirect()->route('equipamentos.index')
            ->with('sucesso', 'Equipamento cadastrado com sucesso!');
    }

    public function edit(Equipamento $equipamento)
    {
        return view('equipamentos.edit', compact('equipamento'));
    }

    public function update(Request $request, Equipamento $equipamento)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|min:5|max:100',
            'categoria' => 'required',
            'localizacao' => 'required|min:5|max:100',
            'status' => 'required'
        ]);

        $equipamento->update($dadosValidados);

        return redirect()->route('equipamentos.index')
            ->with('sucesso', 'Equipamento atualizado com sucesso!');
    }

    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();

        return redirect()->route('equipamentos.index')
            ->with('sucesso', 'Equipamento excluído com sucesso!');
    }
}
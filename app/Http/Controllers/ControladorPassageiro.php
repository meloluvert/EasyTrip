<?php

namespace App\Http\Controllers;

use App\Models\Passageiro;
use App\Models\ViagemPassageiro;
use App\Models\Viagem;
use Illuminate\Http\Request;

class ControladorPassageiro extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Passageiro::all();
        return view('Passageiro/exibe', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Passageiro/novo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = new Passageiro();
        $dados->nome = $request->input('nome');
        $dados->telefone = $request->input('telefone');
        if ($dados->save())
            return redirect('/passageiros')->with('success', 'Autor cadastrado com sucesso!!');
        return redirect('/passageiros')->with('danger', 'Erro ao cadastrar autor!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dados = Passageiro::find($id);
        if (isset($dados))
            return view('Passageiro/edita', compact('dados'));
        return redirect('/passageiros')->with('danger', 'Cadastro do autor não localizado!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dados = Passageiro::find($id);
        if (isset($dados)) {
            $dados->nome = $request->input('nome');
            $dados->telefone = $request->input('telefone');
            $dados->save();
            return redirect('/passageiros')->with('success', 'Cadastro do Autor atualizado com sucesso!!');
        }
        return redirect('/passageiros')->with('danger', 'Cadastro de autor não localizado!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dados = Passageiro::find($id);
        if (isset($dados)) {
            $viagem = ViagemPassageiro::where('passageiro_id', '=', $id)->first();
            if (!isset($viagem)) {
                $dados->delete();
                return redirect('/passageiros')->with('success', 'Cadastro do Autor deletado com sucesso!!');
            } else {
                return redirect('/passageiros')->with('danger', 'Cadastro não pode ser excluído!!');
            }
        } else {
            return redirect('/passageiros')->with('danger', 'Cadastro não localizado!!');
        }
    }
}

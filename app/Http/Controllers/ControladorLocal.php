<?php

namespace App\Http\Controllers;
use App\Models\Local;
use App\Models\Viagem;
use Illuminate\Http\Request;

class ControladorLocal extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Local::all();
        return view('Local/exibe', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Local/novo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = new Local();
        $dados->nome = $request->input('nome');
        $dados->endereco = $request->input('endereco');
        if ($dados->save())
            return redirect('/locais')->with('success', 'Autor cadastrado com sucesso!!');
        return redirect('/locais')->with('danger', 'Erro ao cadastrar autor!');
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
        $dados = Local::find($id);
        if (isset($dados))
            return view('Local/edita', compact('dados'));
        return redirect('/locais')->with('danger', 'Cadastro do autor não localizado!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dados = Local::find($id);
        if (isset($dados)) {
            $dados->nome = $request->input('nome');
            $dados->endereco = $request->input('endereco');
            $dados->save();
            return redirect('/locais')->with('success', 'Cadastro do Autor atualizado com sucesso!!');
        }
        return redirect('/locais')->with('danger', 'Cadastro de autor não localizado!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dados = Local::find($id);
        if (isset($dados)) {
            $viagem_chegada = Viagem::where('endereco_chegada', '=', $id)->first();
            $viagem_saida = Viagem::where('endereco_saida', '=', $id)->first();
            if (!isset($viagem_chegada) || !isset($viagem_saida)) {
                $dados->delete();
                return redirect('/locais')->with('success', 'Cadastro do Autor deletado com sucesso!!');
            } else {
                return redirect('/locais')->with('danger', 'Cadastro não pode ser excluído!!');
            }
        } else {
            return redirect('/locais')->with('danger', 'Cadastro não localizado!!');
        }
    }
}

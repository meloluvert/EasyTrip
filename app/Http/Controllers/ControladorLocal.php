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
        foreach($dados as $item){
            if (empty($item->link_foto)) {
                $item->link_foto = "https://ltfstyleguide.azurewebsites.net/images/placeholder/card-img-cap.png";
            }}
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
        $dados->link_foto = $request->input('link_foto');
        if ($dados->save())
            return redirect('/locais')->with('success', 'local cadastrado com sucesso!!');
        return redirect('/locais')->with('danger', 'Erro ao cadastrar motorista!');
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
        return redirect('/locais')->with('danger', 'Cadastro do local não localizado!');
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
            $dados->link_foto = $request->input('link_foto');
            $dados->save();
            return redirect('/locais')->with('success', 'Cadastro do local atualizado com sucesso!!');
        }
        return redirect('/locais')->with('danger', 'Cadastro de local não localizado!');
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
                return redirect('/locais')->with('success', 'Cadastro do local deletado com sucesso!!');
            } else {
                return redirect('/locais')->with('danger', 'Cadastro não pode ser excluído!!');
            }
        } else {
            return redirect('/locais')->with('danger', 'Cadastro não localizado!!');
        }
    }
}

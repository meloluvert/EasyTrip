<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use App\Models\Viagem;
use Illuminate\Http\Request;

class ControladorMotorista extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Motorista::all();
        foreach($dados as $item){
            if (empty($item->link_foto)) {
                $item->link_foto = "https://ltfstyleguide.azurewebsites.net/images/placeholder/card-img-cap.png";
            }}
        return view('Motorista/exibe', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Motorista/novo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = new Motorista();
        $dados->nome = $request->input('nome');
        $dados->telefone = $request->input('telefone');
        $dados->data_carteira = $request->input('data');
        $dados->link_foto = $request->input('link_foto');
        if ($dados->save())
            return redirect('/motoristas')->with('success', 'Motorista cadastrado com sucesso!!');
        return redirect('/motoristas')->with('danger', 'Erro ao cadastrar motorista!');
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
        $dados = Motorista::find($id);
        if (isset($dados))
            return view('Motorista/edita', compact('dados'));
        return redirect('/motoristas')->with('danger', 'Cadastro do motorista não localizado!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dados = Motorista::find($id);
        if (isset($dados)) {
            $dados->nome = $request->input('nome');
            $dados->telefone = $request->input('telefone');
            $dados->data_carteira = $request->input('data');
            $dados->link_foto = $request->input('link_foto');
            $dados->save();
            return redirect('/motoristas')->with('success', 'Cadastro do motorista atualizado com sucesso!!');
        }
        return redirect('/motoristas')->with('danger', 'Cadastro de motorista não localizado!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dados = Motorista::find($id);
        if (isset($dados)) {
            $viagem = Viagem::where('motorista', '=', $id)->first();
            if (!isset($viagem)) {
                $dados->delete();
                return redirect('/motoristas')->with('success', 'Cadastro do motorista deletado com sucesso!!');
            } else {
                return redirect('/motoristas')->with('danger', 'Cadastro não pode ser excluído!!');
            }
        } else {
            return redirect('/motoristas')->with('danger', 'Cadastro não localizado!!');
        }
    }
}

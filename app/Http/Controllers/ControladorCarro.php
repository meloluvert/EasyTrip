<?php

namespace App\Http\Controllers;
use App\Models\Carro;
use App\Models\Viagem;
use Illuminate\Http\Request;

class ControladorCarro extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Carro::all();
        foreach($dados as $item){
            if (empty($item->link_foto)) {
                $item->link_foto = "https://ltfstyleguide.azurewebsites.net/images/placeholder/card-img-cap.png";
            }}
        return view('Carro/exibe', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Carro/novo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = new Carro();
        $dados->nome = $request->input('nome');
        $dados->placa_veiculo = $request->input('placa');
        $dados->ano_carro = $request->input('ano');
        $dados->link_foto = $request->input('link_foto');
        if ($dados->save())
            return redirect('/carros')->with('success', 'Carro cadastrado com sucesso!!');
        return redirect('/carros')->with('danger', 'Erro ao cadastrar carro!');
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
        $dados = Carro::find($id);
        if (isset($dados))
            return view('Carro/edita', compact('dados'));
        return redirect('/carros')->with('danger', 'Cadastro do carro não localizado!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dados = Carro::find($id);
        if (isset($dados)) {
            $dados->nome = $request->input('nome');
        $dados->placa_veiculo = $request->input('placa');
        $dados->ano_carro = $request->input('ano');
        $dados->link_foto = $request->input('link_foto');
            $dados->save();
            return redirect('/carros')->with('success', 'Cadastro do Carro atualizado com sucesso!!');
        }
        return redirect('/carros')->with('danger', 'Cadastro de carro não localizado!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dados = Carro::find($id);
        if (isset($dados)) {
            $viagem = Viagem::where('carro', '=', $id)->first();
            if (!isset($viagem_chegada) || !isset($viagem_saida)) {
                $dados->delete();
                return redirect('/carros')->with('success', 'Cadastro do carro deletado com sucesso!!');
            } else {
                return redirect('/carros')->with('danger', 'Cadastro não pode ser excluído!!');
            }
        } else {
            return redirect('/carros')->with('danger', 'Cadastro não localizado!!');
        }
    }
}

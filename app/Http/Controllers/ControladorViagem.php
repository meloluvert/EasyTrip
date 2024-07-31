<?php

namespace App\Http\Controllers;

use App\Models\ViagemViagem;
use App\Models\Viagem;
use Illuminate\Http\Request;
use App\Models\Motorista;
use App\Models\Local;
use App\Models\Carro;
use Illuminate\Support\Facades\DB;

class ControladorViagem extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Viagem::all();
        foreach($dados as $item){
            $id = $item->endereco_chegada;
            $local = Local::find($id);
            $item->endereco_chegada = $local->nome;

            $id = $item->endereco_saida;
            $local = Local::find($id);
            $item->endereco_saida = $local->nome;

            $id = $item->motorista;
            $motorista = Motorista::find($id);
            $item->motorista = $motorista->nome;

            $id = $item->carro;
            $carro = Carro::find($id);
            $item->carro = $carro->nome;
            

        }
        
        $dados->endereco_chegada = $local->nome;
        return view('Viagem/exibe', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Viagem/novo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = new Viagem();
        $dados->nome = $request->input('nome');
        $dados->horario_saida = $request->input('hr');
        $dados->carro = null;
        $dados->motorista = null;
        $dados->endereco_chegada = null;
        $dados->endereco_saida = null;
        if ($dados->save())
            return redirect('/viagems')->with('success', 'Autor cadastrado com sucesso!!');
        return redirect('/viagems')->with('danger', 'Erro ao cadastrar autor!');
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
        $dados = Viagem::find($id);
        $carros = Carro::all();
        $locais = Local::all();
        $motoristas = Motorista::all();
       
        if (isset($dados))
            return view('Viagem/edita', compact('dados','carros','locais','motoristas'));
        return redirect('/viagems')->with('danger', 'Cadastro do autor não localizado!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dados = Viagem::find($id);
        if (isset($dados)) {
            $dados->nome = $request->input('nome');
            $dados->horario_saida = $request->input('hr');
            $dados->carro = $request->input('carro');
            $dados->motorista = $request->input('motorista');
            $dados->endereco_chegada = $request->input('local_chegada');
            $dados->endereco_saida = $request->input('local_saida');
           
            $dados->save();
            return redirect('/viagems')->with('success', 'Cadastro do Autor atualizado com sucesso!!');
        }
        return redirect('/viagems')->with('danger', 'Cadastro de autor não localizado!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dados = Viagem::find($id);
        if (isset($dados)) {
            
            if (!isset($viagem)) {
                $dados->delete();
                return redirect('/viagems')->with('success', 'Cadastro do Autor deletado com sucesso!!');
            } else {
                return redirect('/viagems')->with('danger', 'Cadastro não pode ser excluído!!');
            }
        } else {
            return redirect('/viagems')->with('danger', 'Cadastro não localizado!!');
        }
    }
    public function novoPassageiro($id){
        //pega todos os passageiros
        $dados = DB::table('passageiros')->orderBy('nome')->get();
        if(isset($dados)){
            $viagem = Viagem::find($id);
            //pega o nome da viagem
            $dados->nome = $viagem->nome;
            //pega o id do passageiro
            $dados->viagem_id = $id;
            return view('Viagem/novoPassageiroViagem', compact('dados'));
        }
        return redirect('/viagem')->with('danger', 'Não há passageiros cadastrados!!');
    }
}

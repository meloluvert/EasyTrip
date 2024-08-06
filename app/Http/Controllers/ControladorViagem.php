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
            $item->endereco_chegada = (empty($local->nome)) ?  'não há':$local->nome;

            $id = $item->endereco_saida;
            $local = Local::find($id);
            $item->endereco_saida = (empty($local->nome)) ?  'não há':$local->nome;

            if (empty($item->link_foto)) {
                $item->link_foto = "https://ltfstyleguide.azurewebsites.net/images/placeholder/card-img-cap.png";
            }

            $id = $item->motorista;
            $motorista = Motorista::find($id);
            $item->motorista = (empty($motorista->nome)) ?  'não há':$motorista->nome;

            $id = $item->carro;
            $carro = Carro::find($id);
            $item->carro = (empty($carro->nome)) ?  'não há':$carro->nome;
            

        }

        
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
        $dados->link_foto = $request->input('link_foto');
        if ($dados->save())
            return redirect('/viagems')->with('success', 'viagem cadastrada com sucesso!!');
        return redirect('/viagems')->with('danger', 'Erro ao cadastrar viagem!');
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
        return redirect('/viagems')->with('danger', 'Cadastro da viagem não localizado!');
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
            $dados->link_foto = $request->input('link_foto');
            $dados->save();
            return redirect('/viagems')->with('success', 'Cadastro da viagem atualizado com sucesso!!');
        }
        return redirect('/viagems')->with('danger', 'Cadastro da viagem não localizado!');
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
                return redirect('/viagems')->with('success', 'Cadastro da viagem deletado com sucesso!!');
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
    public function pesquisaViagem(){
        $dados = array("tabela" => "viagems");
        return view('Viagem/pesquisa', compact('dados'));
    }
    public function procuraViagem(Request $request){
        $nome = $request->input('texto');
        $dados = DB::table('viagems')->select()->where(DB::raw('lower(nome)'), 'like', '%' . strtolower($nome) . '%')->get();
        return view('Viagem/exibe', compact('dados'));
    }
}

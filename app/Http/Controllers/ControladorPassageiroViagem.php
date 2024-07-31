<?php

namespace App\Http\Controllers;
use App\Models\Passageiro;
use App\Models\ViagemPassageiro;
use App\Models\Viagem;
use Illuminate\Http\Request;

class ControladorPassageiroViagem extends Controller
{
    private $ViagemPassageiro;

    public function __construct(ViagemPassageiro $item){
        $this->ViagemPassageiro = $item;
    }

    public function index($id)
    {
        //acharemos se a viagem está com passageiros
        $dados = $this->ViagemPassageiro->where('viagem_id', $id)->get();
        //acharemos a viagem
        $viagem = Viagem::find($id);
        //o nome que será enviado pra view é o nome do banco
        $dados->nome = $viagem->nome;
        $dados->viagem_id = $viagem->id;
        foreach($dados as $item){
            //vai achar cada passageiro que está na outra tabela
            $passageiro = Passageiro::find($item->passageiro_id);
            $item->nome = $passageiro->nome;
            $item->id = $passageiro->id;
        }
        return view('Viagem/exibeDetalhes', compact('dados'));
    }
    public function store(Request $request)
    {
        $dados = new ViagemPassageiro();
        $dados->passageiro_id = $request->input('passageiro');
        $dados->viagem_id = $request->input('viagem_id');
        if($dados->save())
            return redirect('/viagems')->with('success', 'Autor do livro cadastrado com sucesso!!');
        return redirect('/viagems')->with('danger', 'Erro ao cadastrar autor do livro!');
    }
    public function destroy(string $viagem_id, string $passageiro_id)
    {
        $dados = ViagemPassageiro::where('viagem_id', $viagem_id)->where('passageiro_id', $passageiro_id)->get();
        if(isset($dados)){
            ViagemPassageiro::where('viagem_id', $viagem_id)->where('passageiro_id', $passageiro_id)->delete();
            return redirect('/viagems')->with('success', 'Autor do livro deletado com sucesso!!');
        }
        return redirect('/viagems')->with('danger', 'Erro ao deletar autor do livro!');
    }
}

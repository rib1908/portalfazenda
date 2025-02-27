<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AtualizaCadastro;

class AtualizaCadastroController extends Controller
{
    public function index()
    {

        return view('pages.atualiza_cadastro.index');
    }

    public function store(Request $request)
    {

        $atualiza_cadastro = new AtualizaCadastro;

         $atualiza_cadastro->nome =                  $request->nome;
         $atualiza_cadastro->email =                 $request->email;
         $atualiza_cadastro->cpf =                   $request->cpf;
         $atualiza_cadastro->data_nascimento =       $request->data_nascimento;
         $atualiza_cadastro->celular =               $request->celular;
         $atualiza_cadastro->nome_mae =              $request->nome_mae;
         $atualiza_cadastro->cep =                   $request->cep;
         $atualiza_cadastro->rua =                   $request->rua;
         $atualiza_cadastro->bairro =                $request->bairro;
         $atualiza_cadastro->municipio =             $request->municipio;
         $atualiza_cadastro->estado =                $request->estado;
         $atualiza_cadastro->numero =                $request->numero;
         $atualiza_cadastro->complemento =           $request->complemento;
         $atualiza_cadastro->estado_civil =          $request->EstadoCivil;
         $atualiza_cadastro->dono_aquisicao =        $request->NomeAquisicao;
         $atualiza_cadastro->ano_aquisicao =         $request->AnoAquisicao;
         $atualiza_cadastro->residentes_extras =     $request->residentes_extras;
         $atualiza_cadastro->herdeiros =             $request->herdeiros;

         $atualiza_cadastro->save();


         return redirect('/atualizacaosucesso');

    }

    public function sucesso()
    {
        return view('pages.atualiza_cadastro.sucesso');
    }
}

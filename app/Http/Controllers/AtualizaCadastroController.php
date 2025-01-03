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
        

    }
}

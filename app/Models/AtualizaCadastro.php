<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtualizaCadastro extends Model
{
    use HasFactory;

    protected $table = 'atualiza_cadastro';

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'celular',
        'email',
        'nome_mae',
        'cep',
        'rua',
        'bairro',
        'municipio',
        'numero',
        'complemento',
        'estado',
    ];
}

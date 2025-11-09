<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class servico extends Model
{
    use HasFactory;

    // Define quais campos podem ser preenchidos em massa
    protected $fillable = [
        'nome_servico',
        'descricao',
        'preco',
    ];
}

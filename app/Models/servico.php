<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class servico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_servico',
        'descricao',
        'preco',
    ];
}

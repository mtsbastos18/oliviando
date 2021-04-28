<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable =   [
        'nome',
        'custo', 
        'preco', 
        'quantidade',
        'largura',
        'altura',
        'profundidade',
        'descricao', 
        'status_id', 
        'imagem', 
        'codigo',
        'usuario_criacao',
        'usuario_atualizacao'
    ];

    public function usuarioCriacao()
    {
        return $this->hasOne(User::class,'id','usuario_criacao');
    }

    public function usuarioAtualizacao()
    {
        return $this->hasOne(User::class,'id','usuario_atualizacao');
    }
}

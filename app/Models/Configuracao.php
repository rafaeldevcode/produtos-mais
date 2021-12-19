<?php

namespace App\Models;
use App\Models\Marca;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{

    protected $table = 'configuracoes';

    protected $fillable = [
        'id',
        'modal',
        'icone_produto',
        'comentarios',
        'disclaimer',
        'empresa',
        'cnpj',
        'rua',
        'cidade',
        'atendimento',
        'telefone',
        'email',
        'social',
        'facebook',
        'instagram',
        'twitter',
        'coutdown',
        'tagmanager',
        'pixel'
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
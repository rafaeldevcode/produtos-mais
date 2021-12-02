<?php

namespace App\Models;
use App\Models\Marca;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'id',
        'nome_produto',
        'link_compra',
        'quant_produto',
        'image_produto',
        'valor_unit',
        'valor_cheio',
        'valor_parcelado',
        'parcelas',
        'exibir_produto',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Upsell extends Model
{
    protected $table = 'upsell';
    
    protected $fillable = [
        'id',
        'nome_produto',
        'link_compra',
        'preco_sem_desconto',
        'preco_com_desconto',
        'image_produto'
    ];

    public function getImagemProdutoAttribute()
    {
        $protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=="on") ? "https" : "http");
        $url = "{$protocolo}://{$_SERVER['HTTP_HOST']}/storage/";
        return $url.$this->image_produto;
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}

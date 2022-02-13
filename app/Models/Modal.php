<?php

namespace App\Models;
use App\Models\Marca;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Modal extends Model
{
    protected $table = 'modals';

    protected $fillable = [
        'id',
        'produto_modal',
        'porcentagem',
        'preco_sem_desconto',
        'preco_com_desconto',
        'link_compra',
    ];

    public function getImagemProdutoAttribute()
    {
        $protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=="on") ? "https" : "http");
        $url = "{$protocolo}://{$_SERVER['HTTP_HOST']}/storage/";
        return $url.$this->produto_modal;
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
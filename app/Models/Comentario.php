<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Comentario extends Model
{
    protected $fillable = [
        'id', 
        'nome_cliente', 
        'coment_desc', 
        'image_cliente', 
        'comentario',
        'exibir_coment'
    ];

    public function getImagemClienteAttribute()
    {
        $protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=="on") ? "https" : "http");
        $url = "{$protocolo}://{$_SERVER['HTTP_HOST']}/storage/";
        return $url.$this->image_cliente;
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
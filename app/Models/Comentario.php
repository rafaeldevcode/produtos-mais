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
        return Storage::url($this->image_cliente);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
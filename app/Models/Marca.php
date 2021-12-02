<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Produto, Comentario};

class Marca extends Model
{
    protected $fillable = [
        'id',
        'nome_marca', 
        'slug_marca', 
        'logomarca', 
        'favicon', 
        'banner_1', 
        'banner_2', 
        'banner_3', 
        'image_desc',
        'titulo_desc',
        'cor_principal', 
        'tagmanager', 
        'pixel_1'
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
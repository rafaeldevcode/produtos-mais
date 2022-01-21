<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Produto, Comentario, Configuracao, Modal, Coutdown};
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

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
        'item_1',
        'item_2',
        'item_3',
        'item_4',
        'item_5',
        'cor_principal', 
        'tagmanager',
        'pixel',
        'evento',
        'cnpj',
        'cidade',
        'rua',
        'telefone',
        'email',
        'facebook',
        'instagram',
        'twitter',
        'cor_titulo',
        'cor_texto',
        'disclaimer'
    ];

    public function getImagemLogomarcaAttribute()
    {
        if($this->logomarca){
            return Storage::url($this->logomarca);
        }else{
            return str_replace('/storage', '', Storage::url('/images/logo.png'));
        }
        
    }

    public function getImagemFaviconAttribute()
    {
        if($this->favicon){
            return Storage::url($this->favicon);
        }else{
            return str_replace('/storage', '', Storage::url('/images/favicon.png'));
        }
    }

    public function getImagemBannerOneAttribute()
    {
        return Storage::url($this->banner_1);
    }

    public function getImagemBannerTwoAttribute()
    {
        return Storage::url($this->banner_2);
    }

    public function getImagemBannerTreeAttribute()
    {
        return Storage::url($this->banner_3);
    }

    public function getImagemDescAttribute()
    {
        return Storage::url($this->image_desc);
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function configuracoes()
    {
        return $this->hasMany(Configuracao::class);
    }

    public function modals()
    {
        return $this->hasMany(Modal::class);
    }

    public function coutdown()
    {
        return $this->hasMany(Coutdown::class);
    }

    public function upsell()
    {
        return $this->hasMany(Upsell::class);
    }
}
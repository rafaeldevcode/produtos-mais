<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Imagen extends Model
{
    protected $fillable = ['id', 'imagen'];

    public function getImagemAttribute()
    {
        return Storage::url($this->imagen);
    }
}
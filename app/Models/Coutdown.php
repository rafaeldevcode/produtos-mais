<?php

namespace App\Models;

use App\Models\Marca;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coutdown extends Model
{
    protected $table = 'coutdowns';
    
    protected $fillable = [
        'id',
        'data',
        'time',
        'texto'
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
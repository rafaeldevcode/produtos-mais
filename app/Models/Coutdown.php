<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;

class Coutdown extends Model
{
    protected $table = 'coutdown';
    
    protected $fillable = [
        'data',
        'time'
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}

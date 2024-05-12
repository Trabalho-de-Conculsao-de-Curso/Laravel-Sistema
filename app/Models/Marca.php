<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas';

    protected $fillable = [
        'nome',
        'qualidade',
        'garantia',
        'created_at',
        'updated_at',
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}

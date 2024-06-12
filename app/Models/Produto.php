<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'marca_id',
        'especificacoes_id',
        'preco',
        'lojasOnline',
        'created_at',
        'updated_at',
    ];

    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function especificacoes(){
        return $this->belongsTo(Especificacoes::class);
    }

    public function produtoFinais()
    {
        return $this->belongsToMany(ProdutoFinal::class, 'produto_final_produto');
    }

    public static function search($term)
    {
        return self::where('nome', 'like', '%' . $term . '%');
    }
}

<?php

namespace Database\Factories;

use App\Models\Produto;
use App\Models\Marca;
use App\Models\Especificacoes;
use App\Models\Preco;
use App\Models\LojaOnline;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Produto::class;

    public function definition(): array
    {
        $marca = Marca::factory()->create();
        return [
            'nome' => $this->faker->word,
            'marca_id' => Marca::factory(),
            'especificacoes_id' => Especificacoes::factory(),
            'preco_id' => Preco::factory(),
            'loja_online_id' => LojaOnline::factory(),
        ];
    }

}

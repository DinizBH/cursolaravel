<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Categoria;
use App\Models\User;


class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = $this->faker->unique()->sentence();
        return [
            'nome' => $nome,
            'descricao'=>$this->faker->paragraph(),
            'preco'=>$this->faker->randomNumber(2),
            'slug'=>Str::slug($nome),
            'imagem' => $this->faker->pictureUrl(400, 400) . '?unique=' . $this->faker->uuid,
            'id_user'=> User::pluck('id')->random(),
            'id_categoria'=>Categoria::pluck('id')->random(),
        ];
    }
}

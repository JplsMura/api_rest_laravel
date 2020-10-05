<?php


namespace App\Repositories;

use App\Models\Cidade;

class RepositorieCidade
{
    public function createCidade($nome, $cep)
    {
        $createdCidade = Cidade::create([
            'nome' => $nome,
            'cep' => $cep
        ]);

        return $createdCidade;
    }
}

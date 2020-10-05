<?php


namespace App\Repositories;

use App\Models\Endereco;

class RepositorieEndereco
{
    public function createEndereco($rua, $numero)
    {
        $createdEndereco = Endereco::create([
            'rua' => $rua,
            'numero' => $numero
        ]);

        return $createdEndereco;
    }
}

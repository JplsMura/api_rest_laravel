<?php

namespace App\Repositories;

use App\Models\Estado;

class RepositorieEstado
{
    public function createEstado($nome, $pais)
    {
        $createdEstado = Estado::create([
            'nome' => $nome,
            'pais' => $pais
        ]);

        return $createdEstado;
    }
}

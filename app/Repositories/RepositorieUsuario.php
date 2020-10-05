<?php

namespace App\Repositories;

use App\Models\User;

class RepositorieUsuario
{
    public function createUsuario($nome, $codendereco, $codcidade, $codestado)
    {
        $createdUsuario = User::create([
            'nome' => $nome,
            'codendereco' => $codendereco,
            'codcidade' => $codcidade,
            'codestado' => $codestado
        ]);

        return $createdUsuario;
    }
}

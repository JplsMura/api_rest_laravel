<?php

namespace App\Repositories;

use App\Models\Estado;

class RepositorieEstado
{
    public function all()
    {
        $all = Estado::all();

        return $all;
    }

    public function estado_id($id_estado)
    {
        $estado = Estado::where('id_estado', $id_estado)->first();

        return $estado;
    }

    public function createEstado($nome, $pais)
    {
        $createdEstado = Estado::create([
            'nome' => $nome,
            'pais' => $pais
        ]);

        return $createdEstado;
    }

    public function countEstado($nome)
    {
        $estadoCount = Estado::where('nome', $nome)->count();

        return $estadoCount;
    }
}

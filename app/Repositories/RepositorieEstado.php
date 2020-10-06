<?php

namespace App\Repositories;

use App\Models\Estado;

/**
 * Class RepositorieEstado
 * @package App\Repositories
 */
class RepositorieEstado
{
    /**
     * @return Estado[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        $all = Estado::all();

        return $all;
    }

    /**
     * @param $id_estado
     * @return mixed
     */
    public function estado_id($id_estado)
    {
        $estado = Estado::where('id_estado', $id_estado)->first();

        return $estado;
    }

    /**
     * @param $nome
     * @param $pais
     * @return mixed
     */
    public function createEstado($nome, $pais)
    {
        $createdEstado = Estado::create([
            'nome' => $nome,
            'pais' => $pais
        ]);

        return $createdEstado;
    }

    /**
     * @param $nome
     * @return mixed
     */
    public function countEstado($nome)
    {
        $estadoCount = Estado::where('nome', $nome)->count();

        return $estadoCount;
    }

    /**
     * @param $request
     * @param $usuario
     * @return mixed
     */
    public function updatedRegister($request, $usuario)
    {

        $userUpdated = Estado::where('id_estado', $usuario[0]['codestado'])->update([
            'nome' => $request['estado_nome'],
            'pais' => $request['pais']
        ]);

        return $userUpdated;
    }
}

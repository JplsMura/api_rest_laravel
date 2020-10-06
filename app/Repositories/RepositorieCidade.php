<?php


namespace App\Repositories;

use App\Models\Cidade;

/**
 * Class RepositorieCidade
 * @package App\Repositories
 */
class RepositorieCidade
{
    /**
     * @return Cidade[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        $all = Cidade::all();

        return $all;
    }

    /**
     * @param $id_cidade
     * @return mixed
     */
    public function cidade_id($id_cidade)
    {
        $cidade = Cidade::where('id_cidade', $id_cidade)->first();

        return $cidade;
    }

    /**
     * @param $nome
     * @param $cep
     * @return mixed
     */
    public function createCidade($nome, $cep)
    {
        $createdCidade = Cidade::create([
            'nome' => $nome,
            'cep' => $cep
        ]);

        return $createdCidade;
    }

    /**
     * @param $nome
     * @return mixed
     */
    public function countCidade($nome)
    {
        $cidadeCount = Cidade::where('nome', $nome)->count();

        return $cidadeCount;
    }

    /**
     * @param $request
     * @param $usuario
     * @return mixed
     */
    public function updatedRegister($request, $usuario)
    {

        $userUpdated = Cidade::where('id_cidade', $usuario[0]['codcidade'])->update([
            'nome' => $request['cidade_nome'],
            'cep' => $request['cep']
        ]);

        return $userUpdated;
    }
}

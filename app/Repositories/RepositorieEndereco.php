<?php


namespace App\Repositories;

use App\Models\Endereco;

/**
 * Class RepositorieEndereco
 * @package App\Repositories
 */
class RepositorieEndereco
{
    /**
     * @return Endereco[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        $all = Endereco::all();

        return $all;
    }

    /**
     * @param $id_endereco
     * @return mixed
     */
    public function endereco_id($id_endereco)
    {
        $endereco = Endereco::where('id_endereco', $id_endereco)->first();

        return $endereco;
    }

    /**
     * @param $rua
     * @param $numero
     * @return mixed
     */
    public function createEndereco($rua, $numero)
    {
        $createdEndereco = Endereco::create([
            'rua' => $rua,
            'numero' => $numero
        ]);

        return $createdEndereco;
    }
}

<?php


namespace App\Repositories;

use App\Models\Endereco;

class RepositorieEndereco
{
    public function all()
    {
        $all = Endereco::all();

        return $all;
    }

    public function endereco_id($id_endereco)
    {
        $endereco = Endereco::where('id_endereco', $id_endereco)->first();

        return $endereco;
    }

    public function createEndereco($rua, $numero)
    {
        $createdEndereco = Endereco::create([
            'rua' => $rua,
            'numero' => $numero
        ]);

        return $createdEndereco;
    }
}

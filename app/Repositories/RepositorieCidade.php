<?php


namespace App\Repositories;

use App\Models\Cidade;

class RepositorieCidade
{
    public function all()
    {
        $all = Cidade::all();

        return $all;
    }

    public function cidade_id($id_cidade)
    {
        $cidade = Cidade::where('id_cidade', $id_cidade)->first();

        return $cidade;
    }

    public function createCidade($nome, $cep)
    {
        $createdCidade = Cidade::create([
            'nome' => $nome,
            'cep' => $cep
        ]);

        return $createdCidade;
    }
}

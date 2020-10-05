<?php


namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Repositories\RepositorieEndereco;

class EnderecoController
{
    private $endereco;

    public function __construct()
    {
        $this->endereco = new RepositorieEndereco();
    }


    public function index()
    {
        try {
                $listEndereco = $this->endereco->all();

                if($listEndereco->filter()->isNotEmpty()){
                    return response()->json([
                        'status' => true,
                        'resData' => $listEndereco
                    ]);
                }

            return response()->json([
                'status' => false,
                'resData' => 'Nenhum Endereço encontrado',
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'resData' => [
                    'msg' => 'Erro ao buscar endereços!',
                    'data' => $e->getMessage()
                ]
            ]);
        }
    }

    public function endereco_especifico($id_endereco)
    {
        try {

            $endereco_id = $this->endereco->endereco_id($id_endereco);

            if(!empty($endereco_id)){
                return response()->json([
                    'status' => true,
                    'resData' => $endereco_id
                ]);
            }

            return response()->json([
                'status' => false,
                'resData' => 'Nenhum Endereço encontrado neste ID',
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'resData' => [
                    'msg' => 'Erro ao buscar endereços!',
                    'data' => $e->getMessage()
                ]
            ]);
        }
    }
}

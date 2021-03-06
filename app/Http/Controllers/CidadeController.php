<?php


namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Repositories\RepositorieCidade;

/**
 * Class CidadeController
 * @package App\Http\Controllers
 */
class CidadeController
{
    /**
     * @var RepositorieCidade
     */
    private $cidade;

    /**
     * CidadeController constructor.
     */
    public function __construct()
    {
        $this->cidade = new RepositorieCidade();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {

            $listCidades = $this->cidade->all();

            if($listCidades->filter()->isNotEmpty()){
                return response()->json([
                    'status' => true,
                    'resData' => $listCidades
                ]);
            }

            return response()->json([
                'status' => false,
                'resData' => 'Nenhum Cidade encontrada',
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'resData' => [
                    'msg' => 'Erro ao buscar cidades!',
                    'data' => $e->getMessage()
                ]
            ]);
        }
    }

    /**
     * @param $id_cidade
     * @return \Illuminate\Http\JsonResponse
     */
    public function cidade_especifica($id_cidade)
    {
        try {

            $cidade_id = $this->cidade->cidade_id($id_cidade);

            if(!empty($cidade_id)){
                return response()->json([
                    'status' => true,
                    'resData' => $cidade_id
                ]);
            }

            return response()->json([
                'status' => false,
                'resData' => 'Nenhum Cidade encontrada neste ID',
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'resData' => [
                    'msg' => 'Erro ao buscar cidade!',
                    'data' => $e->getMessage()
                ]
            ]);
        }
    }

    /**
     * @param $nome
     * @return \Illuminate\Http\JsonResponse
     */
    public function countCidade($nome)
    {

        try {

            $cidadeCount = $this->cidade->countCidade($nome);

            if(!empty($cidadeCount)){
                return response()->json([
                    'status' => true,
                    'resData' => $cidadeCount
                ]);
            }

            return response()->json([
                'status' => false,
                'resData' => 'Nenhum Usuário cadastrado nesta cidade',
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'resData' => [
                    'msg' => 'Erro ao buscar quantidade de usuários por cidade!',
                    'data' => $e->getMessage()
                ]
            ]);
        }
    }
}

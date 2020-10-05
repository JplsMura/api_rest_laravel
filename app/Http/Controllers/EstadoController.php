<?php


namespace App\Http\Controllers;


use App\Repositories\RepositorieEstado;

/**
 * Class EstadoController
 * @package App\Http\Controllers
 */
class EstadoController
{
    /**
     * @var RepositorieEstado
     */
    private $estado;

    /**
     * EstadoController constructor.
     */
    public function __construct()
    {
        $this->estado = new RepositorieEstado();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $listEstado = $this->estado->all();

            if($listEstado->filter()->isNotEmpty()){
                return response()->json([
                    'status' => true,
                    'resData' => $listEstado
                ]);
            }

            return response()->json([
                'status' => false,
                'resData' => 'Nenhum Estado encontrado',
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'resData' => [
                    'msg' => 'Erro ao buscar estados!',
                    'data' => $e->getMessage()
                ]
            ]);
        }
    }

    /**
     * @param $id_estado
     * @return \Illuminate\Http\JsonResponse
     */
    public function estado_especifico($id_estado)
    {
        try {

            $estado_id = $this->estado->estado_id($id_estado);

            if(!empty($estado_id)){
                return response()->json([
                    'status' => true,
                    'resData' => $estado_id
                ]);
            }

            return response()->json([
                'status' => false,
                'resData' => 'Nenhum Estado encontrado neste ID',
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'resData' => [
                    'msg' => 'Erro ao buscar estado!',
                    'data' => $e->getMessage()
                ]
            ]);
        }
    }

    /**
     * @param $nome
     * @return \Illuminate\Http\JsonResponse
     */
    public function countEstado($nome)
    {
        try {

            $estadoCount = $this->estado->countEstado($nome);

            if(!empty($estadoCount)){
                return response()->json([
                    'status' => true,
                    'resData' => $estadoCount
                ]);
            }

            return response()->json([
                'status' => false,
                'resData' => 'Nenhum Usuário cadastrado neste estado',
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'resData' => [
                    'msg' => 'Erro ao buscar quantidade de usuários por estado!',
                    'data' => $e->getMessage()
                ]
            ]);
        }
    }
}

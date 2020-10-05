<?php


namespace App\Http\Controllers;


use App\Repositories\RepositorieEstado;

class EstadoController
{
    private $estado;

    public function __construct()
    {
        $this->estado = new RepositorieEstado();
    }

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

<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Repositories\RepositorieCidade;
use App\Repositories\RepositorieEndereco;
use App\Repositories\RepositorieEstado;
use App\Repositories\RepositorieUsuario;
use Illuminate\Support\Facades\Validator;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @var RepositorieCidade
     */
    private $cidade;
    /**
     * @var RepositorieEndereco
     */
    private $endereco;
    /**
     * @var RepositorieEstado
     */
    private $estado;
    /**
     * @var RepositorieUsuario
     */
    private $usuario;

    /**
     * UserController constructor.
     */
    public  function  __construct(){
        $this->cidade = new RepositorieCidade();
        $this->endereco = new RepositorieEndereco();
        $this->estado = new RepositorieEstado();
        $this->usuario = new RepositorieUsuario();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $list = $this->usuario->all();

        return response()->json([
            'status' => true,
            'resData' => $list
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        try {

            $validator  = Validator::make($request->all(), [
                'nome' => 'required|min:3|max:25',
                'rua' => 'required|min:5',
                'numero' => 'required',
                'cidade_nome' => 'required',
                'cep' => 'required',
                'estado_nome' => 'required',
                'pais' => 'required'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'resData' => 'Falta parâmetros na requisição!'
                ]);
            }

            $dados_endereco = $this->endereco->createEndereco($request->rua, $request->numero);

            $dados_cidade = $this->cidade->createCidade($request->cidade_nome, $request->cep);

            $dado_estado = $this->estado->createEstado($request->estado_nome, $request->pais);

            $dados_usuario = $this->usuario->createUsuario($request->nome, $dados_endereco->id, $dados_cidade->id, $dado_estado->id);

            return response()->json([
                'status' => true,
                'resData' => [
                    'msg' => 'Cadastrado com sucesso!',
                    'data' => $dados_usuario
                ]
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'resData' => [
                    'msg' => 'Erro ao cadastrar!',
                    'data' => $e->getMessage()
                ]
            ]);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try{
            $usuario = collect([]);

            $usuario->push($this->usuario->getUserById($id));

            if($usuario->filter()->isNotEmpty()){

               $usuario = $this->usuario->updateUsuario([
                   'id'   => $id,
                   'nome' => $request->nome
               ]);

               return response()->json([
                   'status'  => true,
                   'resData' => 'Usuario atualizado !!'
               ]);
            }

            return response()->json([
                'status'  => false,
                'resData' => 'Usuario não encontrado !!'
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => false,
                'resData' => [
                    'msg' => 'Erro ao atualizar!',
                    'data' => $e->getMessage()
                ]
            ]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {

            $userDestroy = collect([]);

            $userDestroy->push($this->usuario->getUserById($id));

            if($userDestroy->filter()->isNotEmpty()){

                $userDestroy = $this->usuario->destroyUsuario([
                    'id'   => $id
                ]);

                return response()->json([
                    'status' => true,
                    'resData' => [
                        'msg' => 'Usuário Deletado com Sucesso!',
                        'resData' => $userDestroy,
                    ]
                ]);
            }

            return response()->json([
                'status'  => false,
                'resData' => 'Usuario não encontrado !!'
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'resData' => [
                    'msg' => 'Erro ao atualizar!',
                    'data' => $e->getMessage()
                ]
            ]);
        }
    }
}

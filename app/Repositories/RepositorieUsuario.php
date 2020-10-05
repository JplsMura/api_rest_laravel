<?php

namespace App\Repositories;

use App\Models\User;
use http\Env\Request;

/**
 * Class RepositorieUsuario
 * @package App\Repositories
 */
class RepositorieUsuario
{
    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        $all = User::all();

        return $all;
    }

    /**
     * @param $nome
     * @param $codendereco
     * @param $codcidade
     * @param $codestado
     * @return mixed
     */
    public function createUsuario($nome, $codendereco, $codcidade, $codestado)
    {
        $createdUsuario = User::create([
            'nome' => $nome,
            'codendereco' => $codendereco,
            'codcidade' => $codcidade,
            'codestado' => $codestado
        ]);

        return $createdUsuario;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id){

        return User::where('id_usuario', $id)->first();
    }

    /**
     * @param $user
     * @return string
     */
    public function updateUsuario($user)
    {
        try{
            $userUpdate = User::where('id_usuario', $user['id'])->update([
                'nome' => $user['nome']
            ]);

            return $userUpdate;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * @param $user
     * @return string
     */
    public function destroyUsuario($user)
    {
        try {

            $userDestroy = User::where('id_usuario', $user['id'])->delete();

            return $userDestroy;

        }catch (\Exception $e){

            return $e->getMessage();

        }
    }
}

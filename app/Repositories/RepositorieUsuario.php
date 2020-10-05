<?php

namespace App\Repositories;

use App\Models\User;
use http\Env\Request;

class RepositorieUsuario
{
    public function all()
    {
        $all = User::all();

        return $all;
    }

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

    public function getUserById($id){

        return User::where('id_usuario', $id)->first();
    }

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

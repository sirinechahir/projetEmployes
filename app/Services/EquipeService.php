<?php

namespace App\Services;

use App\Exceptions\UserException;
use App\Models\Equipe;
use Illuminate\Database\QueryException;

class EquipeService
{
    public function getListEquipes(){
        try{
            $liste=Equipe::query()->select()->orderBy('code')->get();
        }catch(QueryException $exception){
            $userMessage="Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $liste;
    }

    public function saveEquipe(Equipe $equipe){
        $equipe->save();
        try{
            $equipe=Equipe::query()->find($equipe);
        }catch(QueryException $exception){
            $userMessage="Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $equipe;
    }


    public function getEquipe($id)
    {
        try {
            $equipe = Equipe::query()->find($id);
        } catch (QueryException $exception) {
            $userMessage = "Impossible de lire la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
        return $equipe;
    }
}

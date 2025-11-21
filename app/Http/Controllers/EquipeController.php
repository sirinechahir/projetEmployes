<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;
use App\Services\EquipeService;

class EquipeController
{
    public function listEquipes(){
        try{
            $service=new EquipeService();
            $equipes=$service->getListEquipes();
            return view('listEquipes',compact('equipes'));
        }
        catch (Exception $exception){
            return view('error',compact('exception'));
        }
    }

    public function addEquipe(){
        try {
            $equipe = new Equipe();
            return view('formEquipe', compact('equipe'));
        }

        catch (Exception $exception){
            return view('error',compact('exception'));
        }

    }

    public function validEquipe(Request $request){
        try{
            $id=$request->get('id');
            if ($id){
                $service=new EquipeService();
                $equipe=$service->getEquipe($id);
            }else {
                $equipe=new Equipe();
            }
            $equipe->code=$request->input('code');
            $equipe->libelle=$request->input('libelle');
            $equipe->secteur=$request->input('secteur');

            $service=new EquipeService();
            $service->saveEquipe($equipe);

            return view('home');}
        catch (Exception $exception){
            return view('error',compact('exception'));
        }
    }



    public function editEquipe($id){
        try{
            $service=new EquipeService();
            $equipe=$service->getEquipe($id);
            return view('formEquipe',compact('equipe'));}
        catch (Exception $exception){
            return view('error',compact('exception'));
        }
    }
}

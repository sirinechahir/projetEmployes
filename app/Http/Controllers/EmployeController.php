<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Services\EquipeService;
use Illuminate\Http\Request;
use App\Services\EmployeService;
use Exception;

class EmployeController extends Controller
{
    public function listEmployes(){
        try{
        $service=new EmployeService();
        $employes=$service->getListEmployes();
        return view('listEmployes',compact('employes'));
    }
    catch (Exception $exception){
        return view('error',compact('exception'));
        }
    }

    public function addEmploye(){
        try {
            $employe = new Employe();
            $service=new EquipeService();
            $equipes=$service->getListEquipes();
            return view('formEmploye', compact('employe', 'equipes'));
        }

        catch (Exception $exception){
            return view('error',compact('exception'));
        }

    }

    public function validEmploye(Request $request){
        try{
        $id=$request->get('id');
        if ($id){
            $service=new EmployeService();
            $employe=$service->getEmploye($id);
        }else {
            $employe=new Employe();
        }
        $pwd=$request->input('mdp');
        if (strlen($pwd)<0){
            $employe->pwd=password_hash($request->input('mdp'),PASSWORD_DEFAULT);
        }
        $employe->civilite=$request->input('civilite');
        $employe->prenom=$request->input('prenom');
        $employe->nom=$request->input('nom');
        $employe->pwd=password_hash($request->input('mdp'),PASSWORD_DEFAULT);
        $employe->profil=$request->input('profil');
        $employe->interet=$request->input('interet');
        $employe->message=$request->input('msg');
        $employe->numEqu=$request->input('numEqu');

        $service=new EmployeService();
        $service->saveEmploye($employe);

        return view('home');}
        catch (Exception $exception){
            return view('error',compact('exception'));
        }
    }

    public function editEmploye($id){
        try{
        $service=new EmployeService();
        $serviceEquipe=new EquipeService();
        $employe=$service->getEmploye($id);
        $equipes=$serviceEquipe->getListEquipes();
        return view('formEmploye',compact('employe', 'equipes'));}
    catch (Exception $exception){
            return view('error',compact('exception'));
        }
    }
}

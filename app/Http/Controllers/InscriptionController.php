<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Equipe;

class InscriptionController extends Controller
{
    public function ajoutJoueur($id_equipe, $id_joueur)
    {
        if (!User::find($id_joueur)->getEquipe()) 
        {
            if (count(Equipe::find($id_equipe)->getJoueurs()) < 4) 
            {
                $joueur = New \App\Models\Appartenance;
                    $joueur->id_equipe = $id_equipe;
                    $joueur->id_user = $id_joueur;
                $joueur->save();

                swal()->autoclose('2000')->success('Mise à jour', User::find($id_joueur)->pseudo." à bien été ajouter à l'équipe !",[]);
                return redirect('equipes/'.$id_equipe);
            }
            swal()->autoclose('2000')->error('Erreur','Cette équipe est complète ...',[]);
            return redirect('equipes/'.$id_equipe);
        }
        
        swal()->autoclose('2000')->error('Erreur','Ce joueur est déjà dans une équipe !',[]);
        return redirect('joueurs/'.$id_joueur);
    }
}

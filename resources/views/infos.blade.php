@extends('layouts.template') 
 
@section('content')
@include('sweetalert::view')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h2>Infos pratiques</h2>

            {{--  Ajouter un joueur equipe  --}}
            <div class="col"> 
                <h5>Rajouter des joueurs à mon équipe</h5>
                <p class="text-justify">
                    Pour rajouter des joueurs à son équipe il faut se munir de son id publique.<br />
                    L'id publique d'un joueur n'est visible que par celui-ci. <u><b>Personne d'autre ne peux le voir.</b></u>
                    <br />
                    <img src="/img/info/info_id_publique.png" class="img-fluid">
                    <br />
                    L'id publique correspond aux 5 derniers caractères contenu dans l'url lorsque le joueur est sur son propre profil.
                    Une fois cela fait, il suffit tout simplement de le copier dans le champ accessible sur le profil de votre équipe.
                    <br />
                    <img src="/img/info/info_ajout_joueur.png" class="img-fluid">
                </p>
            </div>

            <div class="col">

            </div>

        </div>
    </div>
@endsection
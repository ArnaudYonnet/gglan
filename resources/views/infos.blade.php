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
                <h5>S'inscrire pour la prochaine LAN</h5>
                <p class="text-justify">
                    Pour pouvoir s'inscrire à la prochaine il faut <u>obligatoirement</u> que votre équipe soit complète (5 Joueurs).
                    Une fois fait, vous verrez sur le profil de votre équipe un bouton comme ci-dessous: <br/> 
                    <button class="btn btn-danger mb-4">S'inscrire pour la prochaine LAN</button>
                    <br/>
                    Si une LAN est programmé et est ouverte aux inscriptions vous pourrez cliquer dessus et ainsi enregistré votre équipe.<br/>
                    Si vous avez inscrit votre équipe mais que vous voulez vous désister veuillez contacter le staff sur le discord <a href="https://discord.gg/mApqnDW" target="_blank">GG-LAN</a> (Le bureau, Membre de l'association ou encore Dev Web).
                </p>
            </div>

        </div>
    </div>
@endsection
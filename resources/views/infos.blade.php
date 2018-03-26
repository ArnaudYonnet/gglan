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
                    Pour ajouter un joueur dans votre équipe, il faut que vous soyez capitaine de l'équipe. <br />
                    Vous trouverez ensuite sur le profil du joueur à ajouter un bouton d'ajout juste en dessous de son avatar,
                    cliquez dessus et le joueur sera immédiatement rajouté à votre équipe 
                    (Seulement si le joueur n'est pas déjà dans une équipe).
                </p>
            </div>

            <hr />

            <div class="col">
                <h5>S'inscrire pour la prochaine LAN</h5>
                <p class="text-justify">
                    Pour pouvoir s'inscrire à la prochaine il faut <u>obligatoirement</u> que votre équipe soit complète (5 Joueurs).
                    Une cela fois fait, vous n'avez qu'à vous rendre (Le capitaine de l'équipe) sur la page tournois et vous inscrire ! <br />
                    <br/>
                    
                    <h4>
                        Vous pouvez à tout moment contacter le staff sur le discord <a href="https://discord.gg/mApqnDW" target="_blank">GG-LAN</a> <br />
                        (Le bureau, Membre de l'association ou encore Dev Web).</h4>
                </p>
            </div>

        </div>
    </div>
@endsection
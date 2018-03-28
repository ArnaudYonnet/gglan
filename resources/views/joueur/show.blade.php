@extends('layouts.template')
@section('content')
@include('sweetalert::view')

    @if (Auth::check() && Auth::id() == $joueur->id)
        @if ($joueur->type == "Joueur")
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h2>
                        <span class="text-danger">{{ $joueur->pseudo}}</span> 
                        <span class="text-secondary">#{{ $joueur->id_public }}</span>
                    </h2>
                    <img src="{{ $joueur->avatar }}" class="img-fluid" style="max-width: 250px" alt="">
        
                    <br />
                    
                    <button type="button" class="btn btn-danger mt-2" data-toggle="modal" data-target="#modal">
                        Modifier mes informations
                    </button>
        
                    <br />
        
                    @if ($joueur->getEquipe())
                        <a href="/equipes/{{ $joueur->getEquipe()->id }}" class="btn btn-danger mt-2">Mon Equipe</a>
                    @else
                        <a href="/equipes/create" class="btn btn-danger" style="margin-top: 2vh;">Créer mon équipe</a>
                    @endif
                    <br />
                    @if (strtolower(Auth::user()->pseudo) == "digitaldrakos")
                        <a href="/joueurs/{{ $joueur->id }}/salutmonpote" class="btn btn-danger" style="margin-top: 2vh;">Salut</a>
                        
                    @endif
                </div>
        
                <div class="col-lg-3 col-md-4 col-sm-8">
                    <ul class="list-unstyled">
                        <li>Nom: 
                            <b> {{ $joueur->nom}} </b>
                        </li>
                        
                        <li>Prénom:
                            <b> {{ $joueur->prenom}} </b>
                        </li>

                        {{--  <li>Pseudo: 
                            <b> {{ $joueur->pseudo}}</b>
                        </li>  --}}

                        <li>E-Mail: 
                            <b> {{ $joueur->email}} </b>
                        </li>

                        <li>Date de naissance:
                            <b> {{ \Carbon\Carbon::parse($joueur->date_naissance)->format('d/m/Y') }} </b> 
                        </li>

                        <li>Ville:
                            @if ($joueur->ville)
                                <b>{{ $joueur->ville }}</b>
                            @else
                                <b>Non-renseigné...</b>
                            @endif
                        </li>

                        <li>Rank:
                            @if ($joueur->getRank())
                                <b>{{ $joueur->getRank()->nom }}</b>
                                <br />
                                <img src="{{ $joueur->getRank()->image }}" alt="Image introuvable...">
                            @else
                                <b>Non-renseigné...</b>
                            @endif
                        </li>

                        <li>Description:
                            <p><b> {{ $joueur->description }} </b></p>
                        </li>
                    </ul>
                    
                </div>
        
                @include('joueur.edit')
            </div>
        @else
            Compte visiteur
        @endif
    @else
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h2>
                    <span class="text-danger">{{ $joueur->pseudo}}</span>
                    <span class="text-secondary">#{{ $joueur->id_public }}</span>
                </h2>

                <img src="{{ $joueur->avatar }}" class="img-fluid" style="max-width: 250px" alt="">
        
                <br />
        
                @if ($joueur->getEquipe())
                    <a href="/equipes/{{ $joueur->getEquipe()->id }}" class="btn btn-danger mt-2" >Son Equipe</a>
                @else
                    @if (Auth::check()
                    && \App\Models\User::find(Auth::id())->getEquipe() 
                    && \App\Models\User::find(Auth::id())->getEquipe()->id_capitaine == \App\Models\Equipe::find(\App\Models\User::find(Auth::id())->getEquipe()->id)->id_capitaine
                    &&  count(\App\Models\Equipe::find(\App\Models\User::find(Auth::id())->getEquipe()->id)->getJoueurs()) < 4   )
                        <a href="/equipes/{{ App\Models\User::find(Auth::id())->getEquipe()->id }}/joueur/{{ $joueur->id }}/add" 
                            class="btn btn-danger mt-2">Ajouter à mon équipe</a>
                    @endif
                @endif
            </div>
        
            <div class="col-lg-3 col-md-4 col-sm-8">
                <ul class="list-unstyled">
                    {{--  <li>Pseudo:
                        <b> {{ $joueur->pseudo}}</b>
                    </li>  --}}

                    <li>Ville:
                        @if ($joueur->ville)
                            <b>{{ $joueur->ville }}</b>
                        @else
                            <b>Non-renseigné...</b>
                        @endif
                    </li>

                    <li>Rank:
                        @if ($joueur->getRank())
                            <b>{{ $joueur->getRank()->nom }}</b>
                            <br />
                            <img src="{{ $joueur->getRank()->image }}" alt="Image introuvable...">
                        @else
                            <b>Non-renseigné...</b>
                        @endif
                    </li>

                    <li>Description:
                        <p><b> {{ $joueur->description }} </b></p>
                    </li>
                </ul>
            </div>
        </div>
    @endif
@endsection
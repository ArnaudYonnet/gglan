@extends('admin.layouts.templateHome')

@section('content')
    {{--  Joueurs  --}}
    <section class="col-sm-12">
        @component('admin.layouts.rowInfo')
                @slot('box_color')
                    box-danger
                @endslot
                @slot('title')
                    <a href="/admin/joueurs">Joueurs</a>
                @endslot
                @slot('table')
                    <table id="joueurs" class="table table-hover">
                        <thead>
                            <th>Pseudo</th>
                            <th>E-mail</th>
                            <th>Jeu</th>
                        </thead>
                        <tbody>
                            @foreach ($joueurs as $joueur)
                            <tr>
                                <td><a href="/joueurs/{{ $joueur->id }}" target="_blank">{{ $joueur->pseudo }}</a></td>
                                <td> {{ $joueur->email }} </td>
                                @if (\App\Models\User::find($joueur->id)->getRank())
                                    <td> {{ \App\Models\Jeu::find(\App\Models\User::find($joueur->id)->getRank()->id_jeu)->nom }} </td>
                                @else
                                    <td>Pas de jeu...</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endslot
                @slot('stats')
                    <div class="progress-group">
                        <span class="progress-text">Joueurs dans une équipe</span>
                        <span class="progress-number"><b>160</b>/200</span>
                    
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                    </div>
                    <div class="progress-group">
                        <span class="progress-text">Joueurs sans équipe</span>
                        <span class="progress-number"><b>160</b>/200</span>
                    
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                    </div>
                @endslot
        @endcomponent
    </section>
        
    {{--  Equipes  --}}
    <section class="col-sm-12">
        @component('admin.layouts.rowInfo')
                @slot('box_color')
                    box-warning
                @endslot
                @slot('title')
                    <a href="/admin/equipes">Equipes</a>
                @endslot
                @slot('table')
                    <table id="equipes" class="table table-hover">
                        <thead>
                            <th>Nom</th>
                            <th>Joueurs</th>
                            <th>Inscrit</th>
                        </thead>
                        <tbody>
                            @foreach ($equipes as $key => $equipe)
                            <tr>
                                <td><a href="/equipes/{{ $equipe->id }}" target="_blank">{{ $equipe->nom_equipe }}</a></td>
                                <td>{{ count($equipe->getJoueurs())+1 }} / 5</td>
                                @if (\App\Models\Tournois::isInscrit($equipe->id))
                                <td><span class="label label-success">Inscrit</span></td>
                                @else
                                <td><span class="label label-danger">Non inscrit</span></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endslot
                @slot('stats')
                    <div class="progress-group">
                        <span class="progress-text">Equipe inscrite</span>
                        <span class="progress-number"><b>160</b>/200</span>
                    
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                    </div>
                    <div class="progress-group">
                        <span class="progress-text">Equipe non-inscrite</span>
                        <span class="progress-number"><b>160</b>/200</span>
                    
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                    </div>
                    <div class="progress-group">
                        <span class="progress-text">Equipe incomplète</span>
                        <span class="progress-number"><b>160</b>/200</span>
                    
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                        </div>
                    </div>
                @endslot
        @endcomponent
    </section>
        
    {{--  Tournois  --}}
    <section class="col-sm-12">
        @component('admin.layouts.rowInfo')
                @slot('box_color')
                    box-primary
                @endslot
                @slot('title')
                    <a href="/admin/tournois">Tournois</a>
                @endslot
                @slot('table')
                    <table id="tournois" class="table table-hover">
                        <thead>
                            <th>Etat</th>
                            <th>Date</th>
                            <th>Tournois</th>
                            <th>Description</th>
                            <th>Place Equipe</th>
                            <th>Jeu</th>
                        </thead>
                        <tbody>
                            @foreach ($tournois as $key => $tournoi)
                            <tr>
                                @if ($tournoi->status == "ouvert")
                                <td><span class="label label-success">Ouvert</span></td>
                                @else
                                <td><span class="label label-danger">Fermé</span></td>
                                @endif
                                <td>
                                    {{ \Carbon\Carbon::parse($tournoi->date_deb)->format('d/m/Y') }} | {{ \Carbon\Carbon::parse($tournoi->date_deb)->diffInDays(\Carbon\Carbon::parse($tournoi->date_fin))+1
                                    }} jour(s)
                                </td>
                                <td> {{ $tournoi->nom_tournois }} </td>
                                <td> {{ $tournoi->description }} </td>
                                <td> {{ $tournoi->place_equipe }} </td>
                                <td> {{ \App\Models\Jeu::find($tournoi->id_jeu)->nom }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endslot
                @slot('stats')
                    @foreach ($tournois as $tournoi)
                        <div class="progress-group">
                            <span class="progress-text"> {{ $tournoi->nom_tournois }} | Equipe inscrite </span>
                            <span class="progress-number"><b>160</b>/200</span>
                        
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                            </div>
                        </div>
                    @endforeach
                @endslot
        @endcomponent
    </section>

    {{-- Jeu --}}
    <section class="col-sm-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <a href="/admin/jeux">Jeux</a>
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="jeux" class="table table-hover">
                    <thead>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Joueurs/Equipe</th>
                    </thead>
                    <tbody>
                        @foreach ($jeux as $jeu)
                        <tr>
                            <td> {{ $jeu->nom }} </td>
                            <td> {{ $jeu->description }} </td>
                            <td> {{ $jeu->nb_jeu }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{--  Ranks  --}}
    <section class="col-sm-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <a href="/admin/ranks">Ranks</a>
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="ranks" class="table table-hover">
                    <thead>
                        <th>Jeu</th>
                        <th>Nom</th>
                    </thead>
                    <tbody>
                        @foreach ($ranks as $key => $rank)
                        <tr>
                            <td> {{ \App\Models\Jeu::find($rank->id_jeu)->nom }} </td>
                            <td> {{ $rank->nom }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

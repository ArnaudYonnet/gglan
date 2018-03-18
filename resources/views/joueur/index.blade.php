@extends('layouts.template')
@section('content')
@include('sweetalert::view')
    <div class="row">
        @foreach ($joueurs as $joueur)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card" >
                    <h5 class="card-header">
                        <a href="/joueurs/{{ $joueur->id }}" class="text-danger">{{ $joueur->pseudo }}</a>
                    </h5>
                    <div class="card-body">
                        <img src="{{ $joueur->avatar }}"  class="mw-85 card-img img-fluid">
                        <p></p>
                        @if ($joueur->getRank())
                            <h6 class="card-subtitle mb-2 text-muted">
                                Rank: {{ $joueur->getRank()->nom }}
                            </h6>
                        @endif
                        
                        @if ($joueur->getEquipe())
                            <h6 class="card-subtitle mb-2 text-muted">
                                Equipe: <a href="/equipes/{{ $joueur->getEquipe()->id }}" class="text-danger">{{ $joueur->getEquipe()->nom_equipe }}</a>
                            </h6>
                        @endif

                        <p class="card-text"> {{ $joueur->description }} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection


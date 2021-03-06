@extends('site.layouts.template')


@section('content')
    <div class="container">
        <div class="row">
            <h1> {{ __('My teams') }} </h1>
            &nbsp
            <button class="btn btn-success mb-2" data-toggle="modal" data-target="#createTeam"> 
                <i class="fas fa-plus"></i> {{ __('Create team') }} 
            </button> 
        </div>

        <hr>            
        <div class="row">
            <div class="col-lg-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($player->teams as $team)
                            <a class="nav-link {{ $loop->first ? 'active':'' }}" id="{{ $team->id }}-tab" 
                                data-toggle="tab" href="#{{ $team->id }}" 
                                role="tab" aria-controls="{{ $team->id }}" 
                                aria-selected="true">
                                {{ $team->name }}
                            </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content">
                    @foreach ($player->teams as $team)
                        <div class="tab-pane fade {{ $loop->first ? 'show active':'' }}" id="{{ $team->id }}" role="tabpanel" aria-labelledby="{{ $team->id }}-tab">
                            <div class="row">
                                {{-- Team name --}}
                                <div class="col-lg-12">
                                    <h4>
                                        <a href="/teams/{{ $team->id }}" class="text-danger"> {{ $team->name }} </a>
                                    </h4>
                                </div>
                            
                                @if (Auth::user()->id != $team->captain()->id)
                                    {{-- Leave team button --}}
                                    <div class="col-lg-4">
                                        <b>{{ __('You cannot manage this team') }}...</b>
                                        <form action="/teams/leave" method="post">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="team_id" value="{{ $team->id }}"> @csrf @method('DELETE')
                                            <button class="btn btn-danger" type="submit">
                                                {{ __('Leave') }} 
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    {{-- Team avatar --}}
                                    <div class="col-lg-4">
                                        <img src="{{ asset(Storage::url($team->avatar)) }}" style="width: 250px;" alt="No avatar found...">
                                    </div>
                                
                                    {{-- Team players --}}
                                    <div class="col-lg-8 mt-lg-0 mt-md-4 mt-sm-4 mt-4 table-responsive">
                                        <table class="table table-striped table-hover text-center">
                                            <thead>
                                                <th>Pseudo</th>
                                                <th>{{ __('Rank') }}</th>
                                                <th></th>
                                                @if (Auth::user()->id == $team->captain()->id)
                                                <th></th>
                                                @endif
                                            </thead>
                                            <tbody>
                                                {{-- Players of the team --}}
                                                @foreach ($team->players as $player)
                                                    <tr class=" {{ ($team->captain()->id == $player->id) ? 'bg-danger':'' }} ">
                                                        {{-- Player pseudo --}}
                                                        <td>
                                                            <a href="/players/{{ $player->id }}" class="text-white">
                                                                <b>{{ $player->pseudo }}</b>
                                                            </a>
                                                        </td>

                                                        {{-- Player rank --}}
                                                        <td>
                                                            @if ($player->getRank($team->game->id)) {{ $player->getRank($team->game->id)->name }} @else {{ __('No rank') }}... @endif
                                                        </td>

                                                        {{-- Rank image --}}
                                                        <td>
                                                            @if ($player->getRank($team->game->id))
                                                            <img src="{{ asset(Storage::url($player->getRank($team->game->id)->logo)) }}" alt="No avatar found...">                        @else {{ __('No rank') }}... @endif
                                                        </td>

                                                        {{-- Delete player button --}}
                                                        @if (Auth::user()->id != $player->id)
                                                            <td class="text-center">
                                                                <form action="/teams/{{ $team->id }}/deleteMate" method="POST">
                                                                    @csrf @method('DELETE')
                                        
                                                                    <input type="hidden" name="user_id" value="{{ $player->id }}">
                                                                    <input type="hidden" name="joinrequest_id" value="{{ $player->joinrequests->where('team_id', $team->id)->first()->id }}">
                                                                    <input type="hidden" name="team_id" value="{{ $team->id }}">
                                        
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class="far fa-trash-alt"></i> {{ __('Delete') }}
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    </tr>
                                                @endforeach 
                                                
                                                {{-- Join Request of players --}}
                                                @foreach ($team->joinrequests as $joinrequest) 
                                                    @if ($joinrequest->status == "waiting")
                                                    <tr>
                                                        <td>
                                                            <a href="/players/{{ $joinrequest->user_id }}" class="text-white">
                                                                <b>{{ App\User::find($joinrequest->user_id)->pseudo }}</b>
                                                            </a>
                                                        </td>
                                                        <td colspan="3">
                                                            <form action="/teams/decision" method="post">
                                                                @csrf @method('PUT')
                                                                <input type="hidden" name="joinrequest_id" value="{{ $joinrequest->id }}">
                                                                <button class="btn btn-success" type="submit" name="decision" value="accept">{{ __('Accept') }}</button>                            &nbsp
                                                                <button class="btn btn-danger" type="submit" name="decision" value="refuse">{{ __('Refuse') }}</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endif 
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    {{-- Update team --}}
                                    <div class="col-lg-12">
                                        <form action="/teams/{{ $team->id }}" method="post" enctype="multipart/form-data">
                                            @csrf @method('PUT')
                                
                                            <input type="hidden" name="team_id" value="{{ $team->id }}">
                                            
                                            {{-- Avatar --}}
                                            <div class="pt-2 form-group row{{ $errors->has('avatar') ? ' has-danger' : '' }}">
                                                <label for="name" class="col-md-1 col-form-label">
                                                    <b> {{ __('Avatar') }}: </b>
                                                </label>
                                                <div class="col-md-4">
                                                    <input id="avatar" type="file" class="form-control {{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" value="{{ $player->avatar}}">                    @if($errors->has('avatar'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('avatar') }}</strong>
                                                    </span> @endif
                                                </div>
                                            </div>
                                            
                                            {{-- Name --}}
                                            <div class="pt-2 form-group row{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                <label for="name" class="col-md-1 col-form-label">
                                                    <b> {{ __('Name') }}: </b>
                                                </label>
                                                <div class="col-md-4">
                                                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $team->name}}"
                                                        required> @if($errors->has('name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span> @endif
                                                </div>
                                            </div>
                                            
                                            {{-- Description --}}
                                            <div class="pt-2 {{ $errors->has('description') ? ' has-danger' : '' }}">
                                                <label for="description" class="control-label">
                                                    <b> {{ __('Description') }}: </b>
                                                </label>
                                                <div class="">
                                                    <textarea name="description" id="description" rows="5" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $team->description }}</textarea>                    @if($errors->has('description'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span> @endif
                                                </div>
                                            </div>
                                            
                                            {{-- Update button --}}
                                            <div class="pt-4">
                                                <button type="submit" class="btn btn-success"> 
                                                    <i class="fas fa-edit"></i>
                                                    {{ __('Update') }} 
                                                </button>
                                            </div>
                                        </form>

                                        {{-- Delete team button --}}
                                        <div class="pt-4">
                                            <form action="/teams/{{ $team->id }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="far fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @foreach ($player->joinrequests as $joinrequest)
            @if ($joinrequest->status == "waiting")
                <div class="row">
                    <div class="col-lg-12">
                        <h4>
                            <a href="/teams/{{ $joinrequest->team_id }}"> {{ App\Team::find($joinrequest->team_id)->name }} </a>
                        </h4>
                    </div>

                    <b> {{ __("The captain of this team has not answered to your request yet") }} </b>
                </div>
            @endif
            <hr>
        @endforeach
    </div>

    {{-- Create team modal --}}
    @include('site.players.createTeam')
@endsection

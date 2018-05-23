@extends('site.layouts.template')


@section('content')
    <div class="container">
        <form action="/players/{{ $player->id }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
        
            <div class="col-lg-12">
                <h1> {{ __('My account') }} </h1>

                <hr>            
            </div>

            <div class="col-lg-12">
                <h4> {{ __('Personnal information') }} </h4>

                <div class="pt-2 form-group row{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label for="name" class="col-md-2 col-form-label">
                        <b> {{ __('Name') }}: </b>
                    </label>
                    <div class="col-md-4">
                        <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $player->name }}"  required autofocus> 
                        @if($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="pt-2 form-group row{{ $errors->has('birth_date') ? ' has-danger' : '' }}">
                    <label for="birth_date" class="col-md-2 col-form-label">
                        <b> {{ __('Birth date') }}: </b>
                    </label>
                    <div class="col-md-4">
                        <input id="birth_date" type="date" class="form-control {{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" value="{{ $player->birth_date }}" disabled 
                            title="Contact an admin for any questions"> 
                        @if($errors->has('birth_date'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('birth_date') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="pt-2 form-group row{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label for="email" class="col-md-2 col-form-label">
                        <b> {{ __('Email') }}: </b>
                    </label>
                    <div class="col-md-4">
                        <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $player->email }}" disabled 
                            title="Contact an admin for any questions"> 
                        @if($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <hr>
            </div>

            <div class="col-lg-12">
                <h4> {{ __('Player information') }} </h4>

                @if ($player->avatar == null)
                    <img src="{{ asset('img/avatar-default.png') }}" style="width: 250px;" alt="No avatar foud...">
                @else
                    <img src="{{ asset(Storage::url($player->avatar)) }}" style="width: 250px;" alt="No avatar foud...">
                @endif

                <div class="pt-2 form-group row{{ $errors->has('avatar') ? ' has-danger' : '' }}">
                    <label for="avatar" class="col-md-1 col-form-label">
                        <b> {{ __('Avatar') }}: </b>
                    </label>
                    <div class="col-md-4">
                        <input id="avatar" type="file" class="form-control {{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" value="{{ $player->avatar }}"> 
                        @if($errors->has('avatar'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('avatar') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="pt-2 form-group row{{ $errors->has('pseudo') ? ' has-danger' : '' }}">
                    <label for="pseudo" class="col-md-1 col-form-label">
                        <b> {{ __('Pseudo') }}: </b>
                    </label>
                    <div class="col-md-4">
                        <input id="pseudo" type="text" class="form-control {{ $errors->has('pseudo') ? ' is-invalid' : '' }}" name="pseudo" value="{{ $player->pseudo }}" required> 
                        @if($errors->has('pseudo'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('pseudo') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="pt-2 form-group row{{ $errors->has('steam') ? ' has-danger' : '' }}">
                    <label for="steam" class="col-md-1 col-form-label">
                        <b> {{ __('Steam') }}: </b>
                    </label>
                    <div class="col-md-6">
                        <input id="steam" type="text" class="form-control {{ $errors->has('steam') ? ' is-invalid' : '' }}" name="steam" value="{{ $player->steam }}" 
                            placeholder="https://steamcommunity.com/profiles/..."> 
                        @if($errors->has('steam'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('steam') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="pt-2 form-group row{{ $errors->has('twitter') ? ' has-danger' : '' }}">
                    <label for="twitter" class="col-md-1 col-form-label">
                        <b> {{ __('Twitter') }}: </b>
                    </label>
                    <div class="col-md-6">
                        <input id="twitter" type="text" class="form-control {{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" value="{{ $player->twitter }}" 
                            placeholder="@taylorotwell"> 
                        @if($errors->has('twitter'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('twitter') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="pt-2 form-group row{{ $errors->has('discord') ? ' has-danger' : '' }}">
                    <label for="discord" class="col-md-1 col-form-label">
                        <b> {{ __('Discord') }}: </b>
                    </label>
                    <div class="col-md-6">
                        <input id="discord" type="text" class="form-control {{ $errors->has('discord') ? ' is-invalid' : '' }}" name="discord" value="{{ $player->discord }}" 
                            placeholder="Username#1234"> 
                        @if($errors->has('discord'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('discord') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="pt-2 form{{ $errors->has('description') ? ' has-danger' : '' }}">
                    <label for="description" class="control-label">
                        <b> {{ __('Description') }}: </b>
                    </label>
                    <div class="">
                        <textarea name="description" id="description" rows="5" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $player->description }}</textarea>
                        @if($errors->has('description'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="btn btn-success"> {{ __('Update') }} </button>
                </div>

                <hr>
            </div>
        </form>

        <div class="col-lg-12 table-responsive">
                <h4> {{ __('Game information') }} </h4>

                <button class="btn btn-success mb-2" type="button" data-toggle="modal" data-target="#addGame"> 
                    <i class="fas fa-plus"></i> {{ __('Add game') }} 
                </button>

                <table class="table table-striped table-hover text-center">
                    <thead>
                        <th>Game</th>
                        <th>Rank</th>
                        <th></th>
                        @if (Auth::check() && Auth::user()->id == $player->id)
                            <th></th>
                        @endif
                    </thead>
                    <tbody>
                        @if ($player->games->count() == 0)
                            <tr>
                                <td colspan=" {{ (Auth::check() && Auth::user()->id == $player->id) ? 4 : 3 }} "> No game...</td>
                            </tr>
                        @else
                            @foreach ($player->games as $game)
                                <tr>
                                    <td> {{ $game->name }} </td>
                                    <td>
                                        @if ($player->getRank($game->id))
                                            {{ $player->getRank($game->id)->name }}
                                        @else
                                            {{ __('No rank') }}...
                                        @endif
                                    </td>
                                    <td>
                                        @if ($player->getRank($game->id))
                                            <img src="{{ asset(Storage::url($player->getRank($game->id)->logo)) }}" alt="No image found...">
                                        @else
                                            {{ __('No rank') }}...
                                        @endif
                                    </td>
                                    @if (Auth::check() && Auth::user()->id == $player->id)
                                        <td class="text-center">
                                            <form action="/players/{{ $player->id }}/game" method="POST"> 
                                                @csrf @method('DELETE')

                                                <input type="hidden" name="game_id" value=" {{ $game->id }} ">
                                                <input type="hidden" name="rank_id" value=" {{ $game->rank_id }} ">

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="far fa-trash-alt"></i> {{ __('Delete') }}
                                                </button>
                                                &nbsp
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRank{{ $game->id }}">
                                                    <i class="far fa-edit"></i> {{ __('Edit') }}
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <hr>
        </div>

            
    </div>

    {{-- Add game modal --}}
    @include('site.players.addGame')

    {{-- Add rank modal --}}
    @include('site.players.addRank')
@endsection
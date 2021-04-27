@extends('layouts.app')

@section('title', $player->name)

@section('content')

    <div class="container" style="max-width: 480px;">
        <div class="row text-center my-5">
            <h1>{{ $player->first_name }} {{ $player->last_name }}</h1>
            <hr>
        
            <div class="col text-start">
                <a class="text-decoration-none text-danger mx-2 h5" href="{{ route('team', [ 'team' => $player->team->id ]) }}">
                    <strong>{{ $player->team->name }}</strong>
                </a>
            </div>

            <div class="col text-end">
                <h5 class="text-muted"><em>{{ $player->email }}</em></h5>
            </div>
            
        </div>
    </div>

@endsection
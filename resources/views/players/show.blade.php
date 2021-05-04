@extends('layouts.app')

@section('title', $player->name)

@section('content')

    <div class="container my-4" style="max-width: 720px;">
        <div class="row">
            <h1 class="">
                <strong>
                    {{ $player->first_name }} {{ $player->last_name }}
                </strong>
            </h1>
            <hr class="mb-1">
        
            <div class="col text-start">
                <a class="text-decoration-none text-danger h6" href="{{ route('team', [ 'team' => $player->team->id ]) }}">
                    <strong>{{ $player->team->name }}</strong>
                </a>
            </div>

            <div class="col text-end">
                <p class="text-muted"><em>{{ $player->email }}</em></p>
            </div>
            
        </div>
    </div>

@endsection
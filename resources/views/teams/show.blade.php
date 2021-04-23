@extends('layouts.app')

@section('title', $team->name)

@section('content')

    <div class="container">
        <h1>{{ $team->name }}</h1>
        <p> {{ $team->email }}</p>
        <p>{{ $team->address }}</p>
        <p>{{ $team->city }}</p>
        <h5>Players:</h5>
        <ul>
            @foreach($team->players as $player)
            <li>
                <a href=" {{ route('player', ['player' => $player]) }}">
                    {{ $player->first_name }} {{ $player->last_name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

@endsection
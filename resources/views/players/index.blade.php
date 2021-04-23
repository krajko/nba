@extends('layouts.app')

@section('title', 'Players')

@section('content')

    <div class="container my-5">
        <ul class="list-unstyled">
            @foreach($players as $player)
            <li>
                <a href="{{ route('player', [ 'player' => $player->id ]) }}">
                    {{ $player->first_name }} {{ $player->last_name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

@endsection
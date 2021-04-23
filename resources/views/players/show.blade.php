@extends('layouts.app')

@section('title', $player->name)

@section('content')

    <div class="container">
        <h1>{{ $player->first_name }} {{ $player->last_name }}</h1>
        <p>{{ $player->email }}</p>
        <a href="{{ route('team', [ 'team' => $player->team->id ]) }}">{{ $player->team->name }}</p>
    </div>

@endsection
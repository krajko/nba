@extends('layouts.app')

@section('title', 'Players')

@section('content')

    <div class="container my-5" style="max-width: 720px;">
        <div class="row mb-2">
            <h1><strong>Players</strong></h1>
            <hr>
        </div>

        <div class="row">

            @foreach($players as $player)
            <div class="border py-2 my-2 bg-white d-flex justify-content-between">
               <div class="mt-2">
                    <h5 class="text-dark">
                        {{ $player->first_name }} {{ $player->last_name }}
                    </h5>
               </div>

               <div>
                    <a class="btn btn-danger px-3" href="{{ route('player', [ 'player' => $player->id ]) }}">Info</a>
               </div>
            </div>
            @endforeach
            
        </div>
    </div>

@endsection
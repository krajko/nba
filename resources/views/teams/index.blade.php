@extends('layouts.app')

@section('title', 'Teams')

@section('content')
    <div class="container my-5">
        <ul class="list-unstyled">
            @foreach ($teams as $team)
            <li>
                <a class="text-warning" href="{{ route('team', [ 'team' => $team->id ]) }}" >{{ $team->city }} {{ $team->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
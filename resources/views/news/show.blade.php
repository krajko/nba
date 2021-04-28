@extends('layouts.app')

@section('title', $article->title)

@section('content')

    <div class="container my-5">
        <div class="row mb-2">
            <h1><strong>News</strong></h1>
            <hr>
        </div>

        <div class="row">
            <h3>{{ $article->title }}</h3>
            <p>Author: <span class="text-muted"> <strong>{{ $article->user->name }}</strong>, {{ $article->user->email }}</span></p>
            <p>{{ $article->content }}</p>
            <div class="">
                @foreach($article->teams as $team)
                    <a 
                        class="badge badge-pill bg-danger text-decoration-none"
                        href="{{ route('team_news', ['team' => $team->id]) }}">
                        {{ $team->name }}
                    </a>
                @endforeach
            </div>
            <p class="text-muted"><em>{{ $article->created_at }}</em></p>
        </div>
        
    </div>

@endsection
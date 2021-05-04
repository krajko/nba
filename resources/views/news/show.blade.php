@extends('layouts.app')

@section('title', $article->title)

@section('content')

    <div class="container my-4" style="max-width: 720px;">
        <div class="row mb-2">
            <h1><strong>News</strong></h1>
            <hr>
        </div>

        <div class="row">
            <p>Author: <span class="text-muted"> 
                <strong>{{ $article->user->name }}</strong>, 
                    <em>{{ $article->user->email }}</em>
            </span></p>
            <h3>{{ $article->title }}</h3>
            <p>{{ $article->content }}</p>
            <p class="text-muted"><em>
            Published
            {{ $article->created_at->format('d/m/Y') }}
            at
            {{ $article->created_at->format('d/m/Y') }}
            </em></p>
            <div class="">
                @foreach($article->teams as $team)
                    <a 
                        class="badge badge-pill bg-danger text-decoration-none"
                        href="{{ route('team_news', ['team_name' => $team->name]) }}">
                        {{ $team->name }}
                    </a>
                @endforeach
            </div>
        </div>
        
    </div>

@endsection
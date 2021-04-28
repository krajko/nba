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
            <p class="text-muted"><em>{{ $article->created_at }}</em></p>
        </div>
        
    </div>

@endsection
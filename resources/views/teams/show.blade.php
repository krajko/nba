@extends('layouts.app')

@section('title', $team->name)

@section('content')

    <div class="container my-4" style="max-width: 720px;">

        <div class="row my-3">
            <h1><strong>{{ $team->name }}</strong></h1>
            <hr>
            <div class="row mt-1">
                <div class="col">
                    <p class="text-muted"> {{ $team->email }} </p>
                </div>
                <div class="col ">
                    <p class="text-muted text-end"> <em> {{ $team->address }}, {{ $team->city }} </em> </p>
                </div>
            </div>
        </div>

        <div class="row my-2 gx-0">
            @foreach($team->players as $player)
            <div class="border d-flex justify-content-between bg-white my-2 p-2">
                <div class="mt-2">
                    <h5 class="text-decoration-none mx-2">
                        {{ $player->first_name }} {{ $player->last_name }}
                    </h5>
                </div>

                <div>
                    <a class="btn btn-danger px-3" href="{{ route('player', ['player' => $player]) }}">Player info »</a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="row my-4 d-flex justify-content-between">

                <h5 class="">
                    @if ($team->comments->count() == 1)
                        1 Comment
                    @else
                        {{ $team->comments->count() }} Comments
                    @endif
                </h5>
                <hr>
                

            <form class="mt-3" action="{{ route('comment', [ 'team' => $team ]) }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <textarea 
                        type="text"
                        class="form-control overflow-auto border-bottom @error('content') is-invalid @enderror"
                        name="content"
                        rows="1"></textarea>
                </div>

                <div class="col-auto">
                    <button class="btn btn-outline-danger" type="submit">Submit</button>
                </div>
                    @error('content')
                        <div class="alert alert-danger mt-1"> {{ $message }} </div>
                    @enderror
            </div>

            </form>

            <ul class="list-unstyled my-1">
                @forelse($team->comments as $comment)
                    <li class="row my-4">
                        <div class="py-0 my-0">
                            <h6 class="my-0 py-0"><strong> {{ $comment->user->name }} </strong></h6>
                        </div>
                        <div class="py-0 my-1">
                            <p class="my-0"> {{ $comment->content }} </p>
                        </div>
                        <div class="py-0 text-muted" style="font-size: .7rem;">
                            <em>
                                {{ $comment->created_at->format('d/m/Y') }}
                             at {{ $comment->created_at->format('h:m:sa') }}
                            </em>
                        </div>
                    </li>
                @empty
                    <li class="text-muted h6"><em>No comments</em></li>
                @endforelse
            </ul>
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('title', 'News')

@section('content')

<div class="container my-4" style="max-width: 720px;">

    <div class="d-flex flex-direction-row align-items-end">
        <div class="col">
            <h1>
                <strong> News </strong>
            </h1>    
        </div>
        <div class="col text-muted text-end">
            <h5 class="">{{ $team->name }}</h5>
        </div>
    </div>
    <div class="row mb-2">
        <hr>
    </div>

    <div class="d-flex flex-wrap justify-content-between">

        @foreach ($news as $article)
        <div class="row my-3">

            <div class="card p-0">

                <div class="card-body pb-1">

                    <h4 class="card-title">
                        <strong> {{ $article->title }} </strong>
                    </h4> 

                    <p class="card-text mb-3"> {{ Str::limit($article->content, 255) }} </p>

                    <div class="row">
                        @foreach($article->teams as $team)
                        <div class="col-auto mb-1">
                            <a 
                                class="badge border border-danger rounded-pill bg-light text-danger text-decoration-none"
                                href="{{ route('team_news', ['team_name' => $team->name]) }}">
                                {{ $team->name }}
                            </a>
                        </div>
                        @endforeach
                    </div>

                </div>

                <div class="card-footer">
                    <div class="d-flex flex-direction-row align-items-end">
                        <div class="col-7">
                            <p class="text-muted p-0 mb-1" style="font-size: .9rem;">
                                Published {{ $article->created_at->format('d/m/Y') }} 
                                at {{ $article->created_at->format('h:m:sa')}}   
                                by 
                                <a class="text-decoration-none text-danger" href="">
                                    <strong>{{ $article->user->name }}</strong> 
                                </a> 
                            </p>
                        </div>
                        <div class="col text-end">
                            <a class="btn btn-sm btn-danger px-4" href="/news/{{$article->id}}">Read full article »</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        @endforeach

    </div>

    <div class="row mt-3">
        <hr>
    </div>

    <div class="pagination justify-content-center mt-3">
        {{ $news->links() }}
    </div> 

</div>


<style>
    .pagination a {
        color: var(--bs-danger);
        text-decoration: none;
    }
    .pagination nav div {
        margin-top: 1rem;
    }
    .page-item.active .page-link {
        background-color: var(--bs-red);
        border-color: var(--bs-red);
    }
    .page-link:hover {
        color: var(--bs-red);
        background-color: #efe9e9;
        border-color: #e6dede;
    }
    svg {
        width: 20px;
    }
</style>

@endsection
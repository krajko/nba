@extends('layouts.app')

@section('title', 'News')

@section('content')

<div class="container my-5" style="max-width: 860px;">
    <div class="row mb-2">
        <h1><strong>News</strong></h1>
        <hr>
    </div>

    <div class="d-flex flex-wrap justify-content-between">

        @foreach ($news as $article)
        <div class="col-6 my-3 mx-auto" style="max-width: 400px">

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title"><strong> {{ Str::limit($article->title, 40) }} </strong></h5>
                    <p class="card-subtitle text-muted"> 
                        Author: 
                        <a class="text-decoration-none text-danger" href="">
                            <strong>{{ $article->user->name }}</strong> 
                        </a>
                    </p>
                    <p class="card-text"> {{ Str::limit($article->content, 150) }} </p>

                    <div class="">
                        <a class="mr-auto btn btn-sm btn-outline-danger" href="/news/{{$article->id}}">View full article</a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach

    </div>

    <div class="row">
    
        <div class="pagination text-center">
            {{ $news->links() }}
        </div>
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
    svg {
        width: 20px;
    }
</style>

@endsection
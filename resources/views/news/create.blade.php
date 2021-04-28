@extends('layouts.app')

@section('title', 'Post article')

@section('content')

<div class="container my-5" style="max-width:840px;">
    <div class="row">
        <h1><strong>Post a news article</strong></h1>
        <hr>
    </div>        

    <form action="/news/create" method="post">
    @csrf
        <input 
            id="title"
            name="title"
            placeholder="Title"
            type="text"
            class="form-control my-3 @error('title') is-invalid @enderror">
        @error('title')
            <div class="alert alert-danger"> {{ $message }}</div>
        @enderror

        <textarea 
            id="content"
            name="content"
            placeholder="Content"
            type="text"
            rows="5"
            class="form-control my-3 @error('content') is-invalid @enderror"></textarea>
        @error('content')
            <div class="alert alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-check form-check-inline text-center my-3">
            <h5>Select related teams:</h5>
            @foreach($teams as $team)
            <!-- <div class="form-group mb-2"> -->
                <input 
                    id="btn-{{ $loop->iteration }}"
                    name="teams[]" 
                    type="checkbox"
                    value="{{ $team->id }}"
                    class="btn-check"
                    autocomplete="off">
                <label 
                    for="btn-{{ $loop->iteration }}"
                    class="btn btn-sm btn-outline-danger mb-1">
                    {{ $team->name }}
                </label>
            <!-- </div> -->
            @endforeach
        </div>

        <div class="text-center">
            <button class="btn btn-danger" type="submit">Publish</button>
        </div>

    </form>

</div>

@endsection
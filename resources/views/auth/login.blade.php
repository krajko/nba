@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="container" style="max-width: 400px">
    
        <div class="row mt-5 text-center text-dark">
            <h1>Login</h1>
            <hr>
        </div>

        <div class="row text-center">
            
            <form action="/login" method="post">
                @csrf

                <input 
                    type="email"
                    class="form-control my-4 @error('email') is-invalid @enderror"
                    name="email"
                    placeholder="Email">

                @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <input 
                    type="password"
                    class="form-control my-4 @error('password') is-invalid @enderror"
                    name="password"
                    placeholder="Password">

                @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                @if ($invalid_credentials ?? false)
                    <div class="alert alert-danger">
                        Invalid credentials.
                    </div>
                @endif
                
                <button class="btn btn-outline-danger" type="submit">Submit</button>
            </form>
            
        </div>

    </div>

    <style>
        .mw-30 {
            max-width: 30vw;
        }
    </style>

@endsection

@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <div class="container" style="max-width: 480px;">
        <div class="row mt-5 text-center text-dark">
            <h1>Register</h1>
            <hr>
        </div>

        <div class="row text-center">
            <form action="/register" method="post">
                @csrf

                <input 
                    type="text" 
                    class="form-control my-3 @error('name') is-invalid @enderror"
                    name="name" 
                    placeholder="Name">

                @error('name')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror

                <input 
                    type="email"    
                    class="form-control my-3 @error('email') is-invalid @enderror"
                    name="email" 
                    placeholder="Email">

                @error('email')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror


                <input 
                    type="password" 
                    class="form-control my-3 @error('password') is-invalid @enderror"
                    name="password" 
                    placeholder="Password">

                @error('password')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror


                <input 
                    type="password" 
                    class="form-control my-3 @error('password') is-invalid @enderror"
                    name="password_confirmation" 
                    placeholder="Confirm password">

                @error('password_confirmation')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror

                <button class="btn btn-outline-danger my-3" type="submit">Submit</button>
            </form>
        </div>
    </div>

@endsection

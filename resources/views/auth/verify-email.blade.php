@extends('layouts.app')

@section('title', 'Verify email')

@section('content')

<div class="container text-center my-5">

    <h1 class="mb-5">A verification link has been sent to your email.</h1>

    <p>Haven't received it yet?</p>
    <form action="/email/verification-notification" method="post">
    @csrf
        <button class="btn btn-outline-danger" type="submit">Resend</button>
    </form>

</div>

@endsection
@extends('layouts.guest')

@section('content')

    <div class="container py-5">
        <h1>HOME pubblica</h1>
        <a class="btn btn-primary" href="{{route('admin.home')}}">
            vai al login
        </a>
    </div>

@endsection

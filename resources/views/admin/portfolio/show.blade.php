@extends('layouts.app')

@section('content')
    <div class="container my-ctn">
        <h1>Portfolio {{$portfolio->name}} {{$portfolio->surname}}</h1>
        <img src="{{$portfolio->image}}" alt="image">
        <h2>{{$portfolio->title}}</h2>
        <p>{{$portfolio->description}}</p>
    </div>
@endsection

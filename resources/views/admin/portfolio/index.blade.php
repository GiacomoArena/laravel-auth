@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Portfolio</h1>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $portfolio)
                    <tr>
                        <td>{{$portfolio->id}}</td>
                        <td>{{$portfolio->name}}</td>
                        <td>{{$portfolio->surname}}</td>
                        <td>
                            <a href="{{route('admin.portfolios.show',$portfolio)}}" class="btn btn-dark">Visit</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection

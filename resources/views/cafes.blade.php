@extends('layout.main')
@section('content')
    <div class="container">
        <div class="headline">

            <h1>Cafes in {{$city->name}}</h1>
        </div>
        <div class="restaurants_main">
            @foreach($cafes as $cafe)
                <div class="card">
                    <img src="{{asset($cafe->images[0]->path)}}" alt="">
                    <div class="card-body">
                        <a href="#"><h2>{{$cafe->name}}</h2></a>
                        <ol>
                            <li>{{$cafe->cuisines}}</li>
                            <li>{{$cafe->ave_check}}₸ per person</li>
                            <li>{{$cafe->features}}</li>
                        </ol>
                        <p>{{$cafe->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layout.main')
@section('content')
    <div class="container">
        <div class="headline">

            <h1>Bars in {{$city->name}}</h1>
        </div>
        <div class="restaurants_main">
            @foreach($bars as $bar)
                <div class="card">
                    <img src="{{asset($bar->images[0]->path)}}" alt="">
                    <div class="card-body">
                        <a href="#"><h2>{{$bar->name}}</h2></a>
                        <ol>
                            <li>{{$bar->cuisines}}</li>
                            <li>{{$bar->ave_check}}₸ per person</li>
                            <li>{{$bar->features}}</li>
                        </ol>
                        <p>{{$bar->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

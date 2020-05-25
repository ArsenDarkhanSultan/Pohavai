@extends('layout.main')
@php
$cuisines = \App\Models\Cuisine::all();
$features = \App\Models\Feature::all();
@endphp
@section('content')
    <div class="container restaurants_container">
        @if(session()->has('alert'))
            <div class="alert alert-success">
                <h2>{{session()->get('alert')}}</h2>
            </div>
        @elseif($errors->any())
            <div class="alert alert-danger">
                <ul style="padding-left: 0; margin-left: 10px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="headline">
            <h1>{{ucwords($est_type->title)}} в {{request()->get('city')->name}}</h1>
        </div>
        <div class="restaurants_main">
            {{$ests->links()}}
            @foreach($ests as $rest)
                <div class="card">
                    <img height="400" src="{{asset($rest->images[0]->path ?? '')}}" alt="">
                    <div class="card-body">
                        <a href="{{route('establishment', [strtolower($est_type->name), $rest->id])}}"><h2>{{$rest->name}}</h2></a>
                        <ol>
                            <li>{{implode(', ', $rest->cuisines->pluck('name')->toArray())}}</li>
                            <li>{{$rest->ave_check->check}}₸ на человека</li>
                            <li>{{implode(', ', $rest->features->pluck('name')->toArray())}}</li>
                        </ol>
                        <p>{{mb_substr($rest->description, 0, 300)}}</p>
                    </div>
                </div>
            @endforeach
            <br>
                {{$ests->links()}}
        </div>
        <div class="filters">
            <div class="card border-info mb-3">
                <div class="card-header">Фильтры</div>
                <div class="card-body text-info">
                    <form method="get" action="{{route('establishments_filter', strtolower($est_type->name))}}">
                        <select class="select_cuisines btn-primary" name="cuisine">
                            <option selected value="any">Кухни</option>
                            @foreach($cuisines as $cuisine)
                                <option value="{{$cuisine->slug}}">{{$cuisine->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        @foreach($features as $feature)
                            <label id="{{$feature->slug}}">
                                {{$feature->name}}
                                <input class="{{$feature->slug}}" type="checkbox" name="features[{{$feature->slug}}]" hidden>
                            </label>
                        @endforeach
                        <button class="btn btn-primary" type="submit">Показать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layout.partials.footer')
@endsection

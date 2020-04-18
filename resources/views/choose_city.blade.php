@extends('layout.main')
@section('content')
    <div class="m-4">
        <p>Choose your city:</p>
        <ul style="list-style: none" class="list-group">
            @foreach($cities as $city)
                <li>
                    <a class="list-group-item" href="{{route('setCity', $city->id)}}" type="button">{{$city->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

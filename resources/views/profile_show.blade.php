@php
    $img_size = 200;
    $user = Auth::user();
@endphp
@extends('layout.main')
@section('content')
    <div class="container pt-0 mt-4">
        <div class="profile_section">
            <div class="avatar">
                <div class="rounded-circle ml-auto mr-auto avatar_image">
                    <img width="200" src="{{asset('storage/'.$user->avatar)}}">
                </div>
                <div class="username">
                    <h1>{{$user->name}}</h1>
                    <p>{{$user->email}}</p>
                </div>
                <a class="btn btn-primary" href="{{route('editProfileForm')}}">Изменить профиль</a>
            </div>
            <div class="info">

            </div>
        </div>
    </div>
@endsection

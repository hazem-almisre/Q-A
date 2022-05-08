@extends('prodect.layout')

@section('content')
    <div class="container">
        <h1>{{ $profile->title }}</h1>
        <h1>{{ $profile->content }}</h1>
        <h1><img src="{{ url($profile->photo) }}" alt=""></h1>
    </div>
@endsection

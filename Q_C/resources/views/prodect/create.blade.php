@extends('prodect.layout')

@section('content')
    <div class="container">
        <form action="{{ route('proudect.store') }}" method="POST">
            @csrf
            <input type="text" name="name"><br>
            <input type="text" name="price"><br>
            <input type="text" name="info"><br>
            <input type="submit">
        </form>
    </div>
@endsection

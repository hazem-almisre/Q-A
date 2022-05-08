@extends('prodect.layout')

@section('content')
    <div class="container">
        <form action="{{ route('proudect.update', $proudect->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input class="form_control" type="text" name="name" value="{{ $proudect->name }} " style="display: block">
            <input type="text" name="price" value="{{ $proudect->price }}" style="display: block">
            <input type="textarea" name="info" value="{{ $proudect->info }}" style="display: block">
            <input type="radio" name="is_buy" value="1">hazem<br>
            <input type="submit" value="Update">
        </form>
    </div>
@endsection

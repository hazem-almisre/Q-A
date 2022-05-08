@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $item)
                <h1>{{ $item }}</h1>
            @endforeach
        @endif
        <div class="container"></div>
        <form action="{{ route('tag.up', $tag->id) }}" method="POST">
            @csrf
            <input type="text" class="button" placeholder="{{ $tag->tag }}" style="display: inline-block"
                name="tag">
            <input type="submit" value="Update">
        </form>
    </div>
@endsection

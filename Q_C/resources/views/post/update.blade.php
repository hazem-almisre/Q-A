@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $item)
                <h1>{{ $item }}</h1>
            @endforeach
        @endif
        <div class="container"></div>
        <form action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type=" text" class="button" value="{{ $post->title }}" style="display: inline-block"
                name="title">
            <input type="textarea" value="{{ $post->description }}" style="display: inline-block" name="description">
            <input type="submit" value="send">
        </form>
    </div>
@endsection

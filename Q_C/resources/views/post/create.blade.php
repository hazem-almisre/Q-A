@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $item)
                <h1>{{ $item }}</h1>
            @endforeach
        @endif
        <div class="container"></div>
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" class="button" placeholder="title" style="display: inline-block" name="title">
            <input type="textarea" placeholder="description" style="display: inline-block" name="description">
            <input type="submit" value="store">
        </form>
    </div>
@endsection

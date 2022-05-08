@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $item)
                <h1>{{ $item }}</h1>
            @endforeach
        @endif
        <div class="container"></div>
        <form action="{{ route('st') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" class="button" placeholder="title" style="display: inline-block" name="title">
            <input type="text" placeholder="content" style="display: inline-block" name="content">
            <input type="file" placeholder="photo" style="display: inline-block" name="photo">
            @foreach ($tag as $value)
                <label for="">{{ $value->tag }}</label>
                <input type="checkbox" name="tag[]" value="{{ $value->id }}">
            @endforeach
            <input type="submit" value="send">
        </form>
    </div>
@endsection

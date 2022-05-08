@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $item)
                <h1>{{ $item }}</h1>
            @endforeach
        @endif
        <div class="container"></div>
        <form action="{{ route('up', $profile->id) }}" method="POST">
            @csrf
            <input type=" text" class="button" placeholder="{{ $profile->title }}" style="display: inline-block"
                name="title">
            <input type="text" placeholder="{{ $profile->content }}" style="display: inline-block" name="content">
            <input type="file" style="display: inline-block" name="photo">
            @foreach ($tag as $value)
                <input type="checkbox" name="tag[]" value="{{ $value->id }}"
                    @foreach ($profile->tag as $value2) @if ($value->id == $value2->id)
                    checked @endif
                    @endforeach>{{ $value->tag }}
            @endforeach
            <input type="submit" value="send">
        </form>
    </div>
@endsection

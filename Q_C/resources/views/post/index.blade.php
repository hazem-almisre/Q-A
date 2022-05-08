@extends('layouts.app')

@section('content')
    @php
    $i = 0;
    @endphp
    <div class="container" style="margin-top: 2%">
        <table class="table">
            <tr>
                <th>
                    <h1>#</h1>
                </th>
                <th>Title</th>
                <th>description</th>
                <th>name</th>
            </tr>
            @foreach ($post as $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->description }}</td>
                    <td>{{ $value->user->name }}</td>
                    <td>
                        <button><a href="{{ route('post.show', $value->id) }}">Show</a></button>
                        <button><a href="{{ route('post.edit', $value->id) }}">Update</a></button>
                        <form action="{{ route('post.destroy', $value->id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delet">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <button><a href="{{ route('post.create') }}">Create</a></button>
    </div>
@endsection

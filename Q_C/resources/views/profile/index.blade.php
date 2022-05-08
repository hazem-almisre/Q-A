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
                <th>content</th>
                <th>photo</th>
                <th>name</th>
            </tr>
            @foreach ($profile as $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->content }}</td>
                    <td><img src="{{ url($value->photo) }}" alt="this image" width="100px"></td>
                    <td>{{ $value->user->name }}</td>
                    <td>
                        <button><a href="{{ route('sh', $value->slug) }}">Show</a></button>
                        @if (Auth::id() == $value->user_id)
                            <button><a href="{{ route('ed', $value->id) }}">Update</a></button>
                            <form action="{{ route('del', $value->id) }} " method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delet">
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        <button><a href="{{ route('cr') }}">Create</a></button>
        <button><a href="{{ route('tr', Auth::id()) }}">MyTrash</a></button>
    </div>
@endsection

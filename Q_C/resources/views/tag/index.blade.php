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
                <th>Tag</th>
            </tr>
            @foreach ($tag as $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $value->tag }}</td>
                    <td>
                        <button><a href="{{ route('tag.ed', $value->id) }}">Update</a></button>
                        <form action="{{ route('tag.del', $value->id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delet">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <button><a href="{{ route('tag.cr') }}">Create</a></button>
    </div>
@endsection

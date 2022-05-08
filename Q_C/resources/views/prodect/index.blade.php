@extends('prodect.layout')

@php
$i = 0;
@endphp
@section('content')
    @if ($mas = Session::get('status'))
        <h1>{{ $mas }}</h1>
    @endif
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($proudect as $value)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->price }}</td>
                        <td>
                            <form action="{{ route('proudect.destroy', $value->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-primary" value="Delet" style="display: inline-block">
                            </form>
                            <button class="btn btn-success"><a href="{{ route('proudect.edit', $value->id) }}"
                                    style="color: white;text-decoration: none">Edit</a></button>
                            <button class="btn btn-warning"><a href="{{ route('proudect.show', $value->id) }}"
                                    style="color: white;text-decoration: none">Show</a></button>
                        </td>
                    </tr>
                @endforeach
        </table>
        <button><a href="{{ route('proudect.create') }}">Create</a></button>
    </div>
@endsection

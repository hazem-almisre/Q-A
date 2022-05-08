@foreach ($comments as $value)
    @php
        if (!is_null($value->parent_id)) {
            $style = 'margin-left: 2%';
        } else {
            $style = '';
        }

    @endphp
    <div style="{{ $style }}">
        <P ><span style="color: rgb(92, 149, 223)">user:</span> {{ $value->user->name }}</P>
        <p ><span style="color: rgb(92, 149, 223)">comment:</span> {{ $value->description }}</p>
        <form action="{{ route('comment.store') }}" method="POST">
            @csrf
            <input type="text" name="description">
            <input type="hidden" name="pos_id" value="{{ $pos_id }}">
            <input type="hidden" name="parent_id" value="{{ $value->id }}">
            <input type="submit" class="btn btn-primary" value="createcomment">
        </form>
    </div>
    @include('hazem.c', ['comments' => $value->re])
@endforeach

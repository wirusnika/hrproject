@section ('content')
    @extends ('layouts.header')

    <form action="{{ route('news.update', ['id' => $oneNews->id] ) }}" method="post">
        {{ method_field('PATCH') }}
        @csrf

        <br> <br>

        <input name="title" type="text" value="{{ $oneNews->title }}">

        <br> <br>

        <input name="description"  value="{{ $oneNews->description }}" placeholder="{{ $oneNews->description }}">

        <br> <br>
        <button type="submit">Edit</button>


    </form>

    <form action="{{ route('news.destroy', ['id' => $oneNews->id] ) }}" method="post">
        {{ method_field('DELETE') }}
        @csrf
        <button type="submit" >Destroy</button>

    </form>

@endsection

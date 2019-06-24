@extends ('layouts.header')
@section ('content')

    <form action="{{ route('news.store') }}" method="post">
        {{ csrf_field() }}
        News Title:
        <br />
        <input type="text" name="title" />
        <br /><br />
        Task description:
        <br />
        <textarea name="description"></textarea>
        <br /><br />

        <button type="submit" >Create</button>
    </form>

@endsection

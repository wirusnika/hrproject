@extends ('layouts.header')
@section ('content')

    <form action="{{ route('notifications.store') }}" method="post">
        {{ csrf_field() }}
        Notification Title:
        <br />
        <input type="text" name="title" />
        <br /><br />
        Notifications description:
        <br />
        <textarea name="description"></textarea>
        <br /><br />

        <button type="submit" >Send</button>
    </form>

@endsection

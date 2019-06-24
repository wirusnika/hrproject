@extends ('layouts.header')
@section ('content')

    @csrf


<div class="col-md-12 mt-2">

    <hr>
    @foreach($usersWithNotification as $person)
        @foreach($person->notifications as $notification)
            <hr>
            <p> Author: {{ $person->name}} -- Created: {{ $notification->created_at }}</p>
            <h3> {{ $notification->title }} </h3>
            <h4>Description </h4>
            <p>{{ $notification->description }}</p>
            <hr>
        @endforeach
    @endforeach
</div>

@endsection ('content')

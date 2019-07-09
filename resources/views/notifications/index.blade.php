@extends ('layouts.header')
@section ('content')

    @csrf

    <div class="container-fluid notification-message">
        <div class="col-md-12 mt-2">


            @foreach($usersWithNotification as $person)
                @foreach($person->notifications as $oneNotification)
                        <div class="row">
                            <div class="col-md-12 mt-5">
                                <p> Author: {{ $person->name}} -- Created: {{ $oneNotification->created_at }}</p>
                            </div>
                        </div>
                        <div class="row messages">
                            <div class="col-md-12">

                                @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                                    <a href="{{ route('notifications.edit', $oneNotification->id) }}"><h2
                                            class="font-weight-bold mt-3">{{ $oneNotification->title }} </h2></a>
                                @else
                                    <h3 class="mt-3"> {{ $oneNotification->title }} </h3>
                                @endif
                                    <hr>
                                    <p>{{ $oneNotification->description }}</p>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
        </div>
    </div>
@endsection ('content')

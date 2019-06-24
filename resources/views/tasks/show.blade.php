@extends ('layouts.header')
@section ('content')


    <p> Event Author: {{ $author->name }}</p>
    <p> Event Date: {{ $thisTask->task_date }}</p>
    <p> Title: {{ $thisTask->name }}</p>
    <p> Description: {{$thisTask->description }}</p>

@endsection

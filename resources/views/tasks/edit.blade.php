@section ('content')
    @extends ('layouts.header')

    <form action="{{ route('tasks.update', ['id' => $task->id] ) }}" method="post">
        {{ method_field('PATCH') }}
        @csrf


        <br>

        <input name="name" type="text" value="{{ $task->name }}">

        <br>

        <input name="description" type="text" value="{{ $task->description }}">

        <br>

        <input name="task_date" type="date" value="{{ $task->task_date }}">

<br>
        <button type="submit">Edit</button>


    </form>

    <form action="{{ route('tasks.destroy', ['id' => $task->id] ) }}" method="post">
        {{ method_field('DELETE') }}
        @csrf
        <button type="submit" >Destroy</button>

    </form>

@endsection

@extends ('layouts.header')
@section ('content')


    <form action="{{ route('tasks.store') }}" method="post">
        {{ csrf_field() }}

        <div class="container  mt-5 news-title">
            <div class="row">
                <div class="col-md-12">
                    <h2>Task name: </h2>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control font-weight-bold" placeholder=""
                               name="name"
                               aria-label="Username"
                               aria-describedby="basic-addon1" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Task description:</h2>
                    <textarea rows="7" cols="45" name="description" class="form-control-message"
                              placeholder="" required></textarea>
                </div>
            </div>
            <br/><br/>
            Start time: <input type="date" name="task_date" class="form-control font-weight-bold col-md-3" required/>
            <br/><br/>
            <button type="submit" class="btn btn-outline-secondary mt-1">Save</button>
        </div>


        {{--    Task name:--}}
        {{--    <br />--}}
        {{--    <input type="text" name="name" />--}}
        {{--    <br />--}}
            <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
        {{--    <br /><br />--}}
        {{--    Task description:--}}
        {{--    <br />--}}
        {{--    <textarea name="description"></textarea>--}}
        {{--    <br /><br />--}}
        {{--    Start time:--}}
        {{--    <br />--}}



        {{--    <br /><br />--}}
        {{--    <input type="submit" value="Save" />--}}


    </form>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "yy-mm-dd"
        });
    </script>


@endsection

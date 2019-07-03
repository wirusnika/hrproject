@extends ('layouts.header')
@section ('content')

    <form action="{{ route('news.store') }}" method="post">
        {{ csrf_field() }}

        <div class="container calendar-create-event text-center">
            <div class="event-header">
                <div class="clouds">
                    <h2 class="text-center mt-4 font-weight-bold">Create New Post</h2>
                </div>
            </div>
            <div class="row mt-5">


                <div class="container  mt-5 news-title">
                    <div class="row">

                        <div class="col-md-12">
                            <h3>Title</h3>
                            <input type="text" name="title" placeholder="">
                        </div>
                        <div class="col-md-12 mt-5">
                            <h3>Event Description</h3>
                            <textarea class="event-description" name="description" type="text" placeholder=""></textarea>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="-image">
                                <img src="/img/iceberg.png" alt="">
                            </div>
                            <input name="emailBroadcast" type="checkbox" class="mt-1">
                            <label class="form-check-label" for="exampleCheck1">Check For Email Broadcast</label>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3 text-center setting-logo">
                            <p>Powered By</p>
                            <img src="/img/cz.png" alt="">

                            {{--<div class="col-md-12">--}}
                            {{--<h2>Description</h2>--}}
                            {{--<label>--}}
                            {{--<textarea rows="5" cols="45" name="description" class="form-control-message" ></textarea>--}}
                            {{--</label><br><br>--}}
                            {{--<label>--}}
                            {{--<input name="emailBroadcast" type="checkbox" class="">--}}
                            {{--</label>--}}
                            {{--<label class="form-check-label" for="exampleCheck1">Check For Email Broadcast</label>--}}

                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<h2>Description</h2>--}}
{{--<textarea rows="5" cols="45" name="description" class="form-control-message" placeholder=""></textarea><br><br>--}}
{{--<input name="emailBroadcast" type="checkbox" class="">--}}
{{--<label class="form-check-label" for="exampleCheck1">Check For Email Broadcast</label>--}}
{{--</div>--}}
{{--</div>--}}

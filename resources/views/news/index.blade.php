@section ('content')
    @extends ('layouts.header')
    <div id='app'></div>
    <form method="get" action="{{route('news.index')}}">
        @csrf
        <div class="container news">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="news-header-image text-center mt-4">
                        {{--<img src="/img/cz.png" alt="">--}}
                        <div class="clouds">
                            <h2 class="mt-4">News And Announcements</h2>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                                <button class="news-post" formaction="{{ route('news.create') }}">Create New Post
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-5 news-title">
                            <h2>News #1</h2>
                            <p style="color: #FF8055;" class="ml-3 font-weight-bold mt-3">By Nina Kikava </p>
                            <p style="color: #6C757D;" class="ml-3 mt-3">2019/07/01 12:44</p>
                        </div>
                    </div>
                    <div class="row news-text">
                        <div class="col-md-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi corporis facilis
                                fugiat fugit magni neque nobis sint vitae voluptatibus. Dolore enim illo iusto pariatur
                                quas tempora unde ut voluptatem.Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Amet animi corporis facilis
                                fugiat fugit magni neque nobis sint vitae voluptatibus. Dolore enim illo iusto pariatur
                                quas tempora unde ut voluptatemLorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Amet animi corporis facilis
                                fugiat fugit magni neque nobis sint vitae voluptatibus. Dolore enim illo iusto pariatur
                                quas tempora unde ut voluptatem</p>
                        </div>
                    </div>
                    {{--@foreach($usersWithNews as $person)--}}
                    {{--@foreach($person->news as $one)--}}
                    {{--@if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')--}}
                    {{--<a href="{{ route('news.edit', $one->id) }}"><p--}}
                    {{--class="font-weight-bold mt-5">{{ $one->title }} </p></a>--}}
                    {{--@else--}}
                    {{--<p class="font-weight-bold mt-5">{{ $one->title }} </p>--}}
                    {{--@endif--}}
                    {{--<p class="font-weight-bold">{{ $one->created_at }} {{ $person->name }}</p>--}}
                    {{--<p class="mb-3"> {{ $one->description }} </p>--}}
                    {{--<hr class="mt-5">--}}
                    {{--@endforeach--}}
                    {{--@endforeach--}}
                </div>
            </div>
        </div>
    </form>
@endsection

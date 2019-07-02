@section ('content')
    @extends ('layouts.header')
    <div id='app'></div>
    <form method="get" action="{{route('news.index')}}">
        @csrf
        <div class="container news">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="news-header-image text-center mt-4">
                        <div class="clouds">
                            <h2 class="mt-4">News And Announcements</h2>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                                <button class="news-post" formaction="{{ route('news.create') }}">Create New Post
                                </button>
                            @endif
                        </div>
                    </div>
                    @foreach($usersWithNews as $person)
                        @foreach($person->news as $one)
                    <div class="row mt-5">
                        <div class="col-md-5 news-title">

                                    @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                                        <a href="{{ route('news.edit', $one->id) }}"><h2
                                                class="font-weight-bold mt-5">{{ $one->title }} </h2></a>
                                    @else
                                        <h2 class="font-weight-bold mt-5">{{ $one->title }} </h2>
                                    @endif
                                    <p style="color: #FF8055;" class="ml-3 font-weight-bold mt-3">By {{ $person->name }} </p>
                                    <p style="color: #6C757D;" class="ml-3 mt-3">{{ $one->created_at }}</p>
                                    <hr class="mt-5">

                        </div>
                    </div>
                    <div class="row news-text">
                        <div class="col-md-12">
                            <p>{{ $one->description }}</p>
                        </div>
                    </div>

                    @endforeach
                    @endforeach


                </div>
            </div>
        </div>
    </form>
@endsection

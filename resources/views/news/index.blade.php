@section ('content')
    @extends ('layouts.header')
    <div id='app'></div>
    <form method="get" action="{{route('news.index')}}">
        @csrf
        <div class="container news">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="news-header-image text-center mt-4">
                        <img src="/img/cz.png" alt="">
                        <img class="clouds" src="/img/clouds.png" alt="">
                    </div>
                    <h2 class="mt-4">News And Announcements</h2>
                    @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                        <button formaction="{{ route('news.create') }}">Create New Post</button>
                    @endif
                    <hr>
                    @foreach($usersWithNews as $person)
                        @foreach($person->news as $one)
                            <p class="font-weight-bold mt-5">{{ $one->title }} </p>
                            <p class="font-weight-bold">{{ $one->created_at }} {{ $person->name }}</p>
                            <p class="mb-3"> {{ $one->description }} </p>
                            <hr class="mt-5">
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </form>
@endsection

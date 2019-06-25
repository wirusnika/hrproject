@section ('content')
    @extends ('layouts.header')



    <div class="row text-center mt-2 m-0">
        <div class="col-md-12">
            <img src="/img/cz.png" alt="">
        </div>
    </div>
    <div class="container-fluid profile mt-3">
        <h1>Profile</h1>
        <form method="post" action="{{ route('profile') }}" enctype="multipart/form-data">
            {{csrf_field('')}}
            <div class="row">
                <div class="col-md-3">

                    <div class="profile-picture">

                        @if($authUserProfileImages != '')
                        @foreach($authUserProfileImages as $one)

                            @if($one != null)
                                <img src="img/profile_imgs/{{ $one }}" alt="">
                            @endif

                        @endforeach
                        @endif
                        {{--                        {{ Form::open(['method' => 'post', 'route' => ['profile'], 'files' => true ]) }}--}}
                        {{--                            {{ method_field('post') }}--}}
                        {{--                        @csrf--}}
                        {{--                        <input type="file" name="picture_name" style="margin-top: 10px;">--}}

                        {{--                        <button type="submit" class="btn btn-outline-secondary mt-3 w-100 font-weight-bold">Submit--}}
                        {{--                        </button>--}}

                        {{--                        {{ Form::close() }}--}}

                    </div>


                </div>


                <div class="col-md-5">
                    <ul>
                        <li>
                            Name: <p>{{ Auth::user()->name }}</p>
                        </li>
                        <li>
                            Email: <p>{{ Auth::user()->email }}</p>
                        </li>
                        <li>
                            Address: <p>{{ Auth::user()->address }}</p>
                        </li>
                        <li>
                            Phone Number: <p>{{ Auth::user()->phone }}</p>
                        </li>
                    </ul>
                </div>
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'Manager')
                    <div id="collapseOne" class="collapse show font-weight-bold" aria-labelledby="headingOne"
                         data-parent="#accordionExample">
                        <div class="card-body">

                            <ul>

                                @foreach($userWithImages  as $one)
                                    <li>
                                        <div class="containercz">
                                            <a class="buttoncz" href="#{{$one->id}}">{{ $one->name }}</a>
                                            <div class="popup" id="{{$one->id}}">

                                                <div class="popup-inner">
                                                    <div class="popup__photo">

                                                        @foreach($one->images as $oneimage)
                                                            @if($one->images != null)
                                                                <img
                                                                    src="img/profile_imgs/{{$oneimage->picture_name}}"
                                                                    alt="">
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                    <div class="popup__text">
                                                        <h1>{{ $one->name }}</h1>
                                                        <p>E-mail: {{  $one->email }}</p>
                                                        <p>address: {{  $one->address }}</p>
                                                        <p>Telephone: {{  $one->phone }}</p>
                                                        {!!  Form::open(['method' => 'post', 'route' => ['editDays'] ]) !!}

                                                        <div>
                                                            <p>Sick Days:
                                                                <input
                                                                    placeholder="{{ $one->sick_days }}"
                                                                    type="number"
                                                                    name="sickDays"
                                                                    step="1" min="0" max="100" required>
                                                                <button name="id" value="{{$one->id}}" type="submit">
                                                                    Edit
                                                                </button>

                                                            </p>

                                                        </div>

                                                        {!!  Form::close()  !!}

                                                        {!!  Form::open(['method' => 'post', 'route' => ['editDays'] ]) !!}

                                                        <div>
                                                            <p>Vocation Days Left:
                                                                <input
                                                                    placeholder="{{ $one->vocation_days }}"
                                                                    type="number"
                                                                    name="vocationDays"
                                                                    step="1" min="0" max="55" required>
                                                                <button name="id" value="{{$one->id}}" type="submit">
                                                                    Edit
                                                                </button>

                                                            </p>

                                                        </div>

                                                        {!!  Form::close()  !!}


                                                        <p>Hours Missed: {{  $one->hour_missed }}


                                                    </div>

                                                    <div class="popup__drive">
                                                        <div class="container-fluid mt-5">
                                                            <div class="row">
                                                                <div class="col-md-12 col-md-12-mine">
                                                                    <div class="accordion" id="accordionExample">
                                                                        <div class="card">
                                                                            <div class="card-header font-weight-bold"
                                                                                 id="headingOne">
                                                                                <h5 class="mb-0">
                                                                                    <button
                                                                                        class="btn btn-link font-weight-bold"
                                                                                        type="button"
                                                                                        data-toggle="collapse"
                                                                                        data-target="#collapseOne"
                                                                                        aria-expanded="true"
                                                                                        aria-controls="collapseOne">
                                                                                        1. ID cards or Passeort
                                                                                    </button>
                                                                                </h5>
                                                                            </div>

                                                                            <div id="collapseOne"
                                                                                 class="collapse show font-weight-bold"
                                                                                 aria-labelledby="headingOne"
                                                                                 data-parent="#accordionExample">
                                                                                <div class="card-body text-center">

                                                                                    @foreach($one->images as $onepassportimage)

                                                                                        @if($onepassportimage->id_passport != null)

                                                                                            <a href="{{ asset('img/ids/' . trim($onepassportimage->id_passport, '"') ) }}"><img
                                                                                                    src="img/ids/{{ trim($onepassportimage->id_passport, '"') }}"
                                                                                                    alt=""
                                                                                                    class="profile-drive-images"
                                                                                                    style=""></a>


                                                                                        @endif
                                                                                    @endforeach


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-header font-weight-bold"
                                                                                 id="headingTwo">
                                                                                <h5 class="mb-0">
                                                                                    <button
                                                                                        class="btn btn-link collapsed font-weight-bold"
                                                                                        type="button"
                                                                                        data-toggle="collapse"
                                                                                        data-target="#collapseTwo"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapseTwo">
                                                                                        2. Contracts
                                                                                    </button>
                                                                                </h5>
                                                                            </div>
                                                                            <div id="collapseTwo"
                                                                                 class="collapse font-weight-bold"
                                                                                 aria-labelledby="headingTwo"
                                                                                 data-parent="#accordionExample">
                                                                                <div class="card-body text-center">


                                                                                    @foreach($one->images as $oneDoc)
                                                                                        @if($oneDoc->contract != null)
                                                                                            @if( str_contains(trim($oneDoc->contract, '"'), '.pdf'))
                                                                                                <a target="_blank"
                                                                                                   href="{{ asset('img/contracts/' . trim($oneDoc->contract, '"')) }}">Click
                                                                                                    <object width="80"
                                                                                                            height="90"
                                                                                                            type="application/pdf"
                                                                                                            data="img/contracts/{{ trim($oneDoc->contract, '"') }}">
                                                                                                        <p>Something
                                                                                                            gone wrong
                                                                                                            try again or
                                                                                                            call me</p>
                                                                                                    </object>
                                                                                                </a>
                                                                                            @else
                                                                                                <img
                                                                                                    src="img/contracts/{{ trim($oneDoc->contract, '"') }}"
                                                                                                    class="profile-drive-images"
                                                                                                    alt="" style="">
                                                                                            @endif

                                                                                        @endif
                                                                                    @endforeach

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card">
                                                                            <div class="card-header font-weight-bold"
                                                                                 id="headingThree">
                                                                                <h5 class="mb-0">
                                                                                    <button
                                                                                        class="btn btn-link collapsed font-weight-bold"
                                                                                        type="button"
                                                                                        data-toggle="collapse"
                                                                                        data-target="#collapseThree"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapseThree">
                                                                                        3. Insurance Documents
                                                                                    </button>
                                                                                </h5>
                                                                            </div>
                                                                            <div id="collapseThree"
                                                                                 class="collapse font-weight-bold"
                                                                                 aria-labelledby="headingThree"
                                                                                 data-parent="#accordionExample">
                                                                                <div class="card-body text-center">

                                                                                    @foreach($one->images as $oneDoc)
                                                                                        @if($oneDoc->insurance_doc != null)
                                                                                            @if( str_contains(trim($oneDoc->insurance_doc, '"'), '.pdf'))
                                                                                                <a target="_blank"
                                                                                                   href="{{ asset('img/insurance/' . trim($oneDoc->insurance_doc, '"')) }}">Click
                                                                                                    <object width="80"
                                                                                                            height="90"
                                                                                                            type="application/pdf"
                                                                                                            data="img/insurance/{{ trim($oneDoc->insurance_doc, '"') }}">
                                                                                                        <p>Something
                                                                                                            gone wrong
                                                                                                            try again or
                                                                                                            call me</p>
                                                                                                    </object>
                                                                                                </a>
                                                                                            @else
                                                                                                <img
                                                                                                    src="img/insurance/{{ trim($oneDoc->insurance_doc, '"') }}"
                                                                                                    class="profile-drive-images"
                                                                                                    alt="" style="">
                                                                                            @endif

                                                                                        @endif
                                                                                    @endforeach

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <a class="popup__close" href="#">X</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                @endforeach

                            </ul>

                        </div>
                        <strong style="">   {{ $userWithImages->links() }} </strong>
                    </div>
                @endif

            </div>
        </form>
        <div class="row">
            <ul class="days-info mt-5">
                <li>
                    <p>Sick Days : {{ Auth::user()->sick_days }}</p>
                </li>
                <li>
                    <p>Vocation Day left: {{ Auth::user()->vocation_days }}</p>
                </li>

                <li>
                    <p>Being Late : {{ Auth::user()->hour_missed }} hours</p>
                </li>
            </ul>

        </div>


        <div id='app'></div>

        @if( \Illuminate\Support\Facades\Auth::user()->role == 'Employee')
            <div class="col-md-12 mt-2">


                {{Form::open(['method' => 'get', 'route' => ['notifications.create'] ])}}
                @csrf
                <h2 class="mt-4 chemim">Send Notification to Manager</h2>
                <button formaction="{{ route('notifications.create') }}">Create Notification</button>

                {{  Form::close()   }}

            </div>
        @endif


    </div>


@endsection

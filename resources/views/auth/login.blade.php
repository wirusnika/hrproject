@extends ('layouts.header')
@section ('content')
    <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="row text-center mt-2  m-0">
            <div class="col-md-12">
                <img src="/img/cz.png" alt="">
            </div>
        </div>
        <div class="container inputs mt-5">
            <div class="row">
                <div class="col-12 mt-5 ml-3">
                    <div class="input-group mb-3">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} font-weight-bold ml-3"
                               placeholder="Email Address"
                               aria-label="Email Address"
                               aria-describedby="basic-addon1" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" name="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} font-weight-bold ml-3"
                               placeholder="Password"
                               aria-label="Password"
                               aria-describedby="basic-addon1">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <script type="text/javascript">
                                window.location.href = "/profile";
                            </script>
                        @else
                            <button class="btn btn-outline-secondary mt-5 font-weight-bold ml-3" href="{{ route('login') }}">Login</button>

                            @if (Route::has('register'))
                                <a class="btn btn-outline-secondary mt-5 font-weight-bold ml-3" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            <div class="row mt-4">
                <div class="col-md-12 ml-3">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>

@endsection

@extends ('layouts.header')
@section ('content')
    <form method="post" action="{{ route('login') }}">
        @csrf
    </form>

@endsection
<div class="container login mt-5">
    <div class="row">
        <div class="col-12 mt-5 p-0">
            <h2>SING IN</h2>
            <div class="background-login-image">
                <div class="input-groups">
                    <input class="login-inputs mt-3" id="email" type="email" placeholder="Email Adress">
                    {{--<input id="email" type="email"--}}
                    {{--class="{{ $errors->has('email') ? ' is-invalid' : '' }} font-weight-bold"--}}
                    {{--placeholder="Email Address"--}}
                    {{--aria-label="Email Address"--}}
                    {{--aria-describedby="basic-addon1" name="email" value="{{ old('email') }}">--}}
                </div>
                <div class="input-groups mb-3">
                    <input class="login-inputs mt-3" id="password" type="password" name="password"
                           placeholder="Password">
                    {{--<input id="password" type="password" name="password"--}}
                    {{--class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} font-weight-bold"--}}
                    {{--placeholder="Password"--}}
                    {{--aria-label="Password"--}}
                    {{--aria-describedby="basic-addon1">--}}
                    {{--@if ($errors->has('password'))--}}
                    {{--<span class="invalid-feedback" role="alert">--}}
                    {{--<strong>{{ $errors->first('password') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    <button class="btn btn-outline-secondary mt-5 font-weight-bold"
                            href="{{ route('login') }}" type="submit">Login
                    </button>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="flex-center position-ref full-height">--}}
        {{--@if (Route::has('login'))--}}
        {{--<div class="top-right links">--}}
        {{--@auth--}}
        {{--<script type="text/javascript">--}}
        {{--window.location.href = "/profile";--}}
        {{--</script>--}}
        {{--@else--}}
        {{--@endauth--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
</div>
<div class="row mt-2  m-0">
    <div class="col-md-12">
        <p>Powered By</p>
        <img src="/img/cz.png" alt="">
    </div>
</div>
{{--<button class="btn btn-outline-secondary mt-5 font-weight-bold ml-3"--}}
{{--href="{{ route('login') }}">Login--}}
{{--</button>--}}

{{--@if (Route::has('register'))--}}
{{--<a class="btn btn-outline-secondary mt-5 font-weight-bold ml-3"--}}
{{--href="{{ route('register') }}">Register</a>--}}
{{--@endif--}}
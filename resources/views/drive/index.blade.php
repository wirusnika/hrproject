@extends ('layouts.header')
@section ('content')


    <div class="drive-header-image text-center mt-4">
        <img src="/img/cz.png" alt="">
        <img class="clouds" src="/img/clouds.png" alt="">
    </div>
    <div class="container-fluid mt-5">

        <form method="post" action="{{ route('drives.store') }}">
            @csrf
            <div class="container">
                <label>User</label>
                <br>
                <input type="email" name="user" placeholder="Input Name / Email" required>
                <br><br>
                <label>Drive link</label>
                <br>
                <input name="driveLink" placeholder="Input Drive Link" required>
                <br><br>
                <button type="submit">Add</button>

            </div>
        </form>
@endsection

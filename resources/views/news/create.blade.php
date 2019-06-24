@extends ('layouts.header')
@section ('content')

    <form action="{{ route('news.store') }}" method="post">
        {{ csrf_field() }}

        <div class="container  mt-5 news-title">
            <div class="row">
                <div class="col-md-12">
                    <h2>Title</h2>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control font-weight-bold" placeholder=""
                               name="title"
                               aria-label="Username"
                               aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Description</h2>
                    <textarea rows="5" name="description" class="form-control-message" placeholder=""></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-secondary mt-1">Create</button>
        </div>

    </form>

@endsection

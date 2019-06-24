@extends ('layouts.header')
@section ('content')


        <div class="drive-header-image text-center mt-4">
            <img src="/img/cz.png" alt="">
            <img class="clouds" src="/img/clouds.png" alt="">
        </div>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header font-weight-bold" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link font-weight-bold" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        1. ID cards or Passeort
                                    </button>
                                </h5>
                            </div>

                            @csrf

                            <div id="collapseOne" class="collapse show font-weight-bold" aria-labelledby="headingOne"
                                 data-parent="#accordionExample">

                                <div class="card-body text-center">


                                    @foreach($AuthUsersAllWithImagesAll  as $one  )

                                        @foreach($one->images as $string)

                                            @if(!is_null($string->id_passport))
                                                @if( str_contains($string->id_passport,  '.pdf'))



                                                    <div class="imageHolder">

                                                        <button type="submit" value="{{ $string->id }}"
                                                                onclick="window.location='{{ route('imageDestroyer', $string->id) }}'"
                                                                class='close'>X
                                                        </button>

                                                        <a href="{{ asset('img/ids/' . $string->id_passport) }}">
                                                            <object width="400" height="500" type="application/pdf"
                                                                    data="img/ids/{{ trim($string->id_passport, '"') }}">
                                                                <p>Something gone wrong try again or call me</p>
                                                            </object>
                                                        </a>
                                                    </div>
                                                @else

                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['imageDestroyer', $string->id]]) }}

           @csrf
                                                               {{ method_field('DELETE') }}
                                                    <div class="imageHolder"><button type="submit" class='close'>X
                                                        </button>

                                                        {{ Form::close() }}
                                                        <img src="img/ids/{{ $string->id_passport }}" alt=""
                                                             class="drive-images"
                                                             style="">
                                                    </div>
                                                @endif

                                            @endif

                                        @endforeach
                                    @endforeach

                                        {{ Form::open(['method' => 'POST', 'route' => ['drive'], 'enctype' => 'multipart/form-data']) }}

                                        @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="file" name="id_passport[]" style="margin-top: 10px;"
                                                   multiple><br>
                                            <button type="submit" class="btn btn-outline-secondary mt-3">Submit</button>
                                        </div>
                                    </div>


                                        {{ Form::close() }}


                                 </div>
                             </div>
                         </div>
                         <div class="card">
                             <div class="card-header font-weight-bold" id="headingTwo">
                                 <h5 class="mb-0">
                                     <button class="btn btn-link collapsed font-weight-bold" type="button"
                                             data-toggle="collapse"
                                             data-target="#collapseTwo" aria-expanded="false"
                                             aria-controls="collapseTwo">
                                         2. Contracts
                                     </button>
                                 </h5>
                             </div>
                             <div id="collapseTwo" class="collapse font-weight-bold" aria-labelledby="headingTwo"
                                  data-parent="#accordionExample">
                                 <div class="card-body text-center">
                                     @foreach($AuthUsersAllWithImagesAll  as $one  )

                                         @foreach($one->images as $string)

                                             @if(!is_null($string->contract))
                                                 @if( str_contains($string->contract,  '.pdf'))

                                                     <div class="imageHolder">

                                                         <button type="submit" value="{{ $string->id }}"
                                                                 onclick="window.location='{{ route('imageDestroyer', $string->id) }}'"
                                                                 class='close'>X
                                                         </button>

                                                         <a href="{{ asset('img/contracts/' . $string->contract) }}">
                                                             <object width="400" height="500" type="application/pdf"
                                                                     data="img/contracts/{{ trim($string->contract, '"') }}">
                                                                 <p>Something gone wrong try again or call me</p>
                                                             </object>
                                                         </a>
                                                     </div>
                                                 @else

                                                     {{ Form::open(['method' => 'DELETE', 'route' => ['imageDestroyer', $string->id]]) }}

                                                     @csrf
                                                     {{ method_field('DELETE') }}
                                                     <div class="imageHolder"><button type="submit" class='close'>X
                                                         </button>

                                                         {{ Form::close() }}
                                                         <img src="img/contracts/{{ $string->contract }}" alt=""
                                                              class="drive-images"
                                                              style="">
                                                     </div>
                                                 @endif

                                             @endif

                                         @endforeach
                                     @endforeach

                                     {{ Form::open(['method' => 'POST', 'route' => ['drive'], 'enctype' => 'multipart/form-data']) }}

                                     @csrf

                                     <div class="row">
                                         <div class="col-md-12">
                                             <input type="file" name="contract[]" style="margin-top: 10px;"
                                                    multiple><br>
                                             <button type="submit" class="btn btn-outline-secondary mt-3">Submit</button>
                                         </div>
                                     </div>


                                     {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header font-weight-bold" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed font-weight-bold" type="button"
                                            data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                        3. Insurance Documents
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse font-weight-bold" aria-labelledby="headingThree"
                                 data-parent="#accordionExample">
                                <div class="card-body text-center">

                                    @foreach($AuthUsersAllWithImagesAll  as $one  )

                                        @foreach($one->images as $string)

                                            @if(!is_null($string->insurance_doc))
                                                @if( str_contains($string->insurance_doc,  '.pdf'))

                                                    <div class="imageHolder">

                                                        <button type="submit" value="{{ $string->id }}"
                                                                onclick="window.location='{{ route('imageDestroyer', $string->id) }}'"
                                                                class='close'>X
                                                        </button>

                                                        <a href="{{ asset('img/insurance/' . $string->insurance_doc) }}">
                                                            <object width="400" height="500" type="application/pdf"
                                                                    data="img/insurance/{{ trim($string->insurance_doc, '"') }}">
                                                                <p>Something gone wrong try again or call me</p>
                                                            </object>
                                                        </a>
                                                    </div>
                                                @else

                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['imageDestroyer', $string->id]]) }}

                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <div class="imageHolder"><button type="submit" class='close'>X
                                                        </button>

                                                        {{ Form::close() }}
                                                        <img src="img/insurance/{{ $string->insurance_doc }}" alt=""
                                                             class="drive-images"
                                                             style="">
                                                    </div>
                                                @endif

                                            @endif

                                        @endforeach
                                    @endforeach

                                    {{ Form::open(['method' => 'POST', 'route' => ['drive'], 'enctype' => 'multipart/form-data']) }}

                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="file" name="insurance_doc[]" style="margin-top: 10px;"
                                                   multiple><br>
                                            <button type="submit" class="btn btn-outline-secondary mt-3">Submit</button>
                                        </div>
                                    </div>


                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

@endsection

@extends('layouts.jumbo')

@section('head')
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>


    <style>
        .contenitore-x {
            background-color: #e9edf5;

        }
        h4 {
            color: #031b4e; !important;
            font-size: 32px !important;
            font-weight: bold !important;
        }

        h3 {
            color: white !important;
        }
    </style>

@endsection


@section('content')
    <main>
      <section class="hero hero--video">
        <div class="container">
          <div class="col-12">
            <div class="search">
            <form action="{{route('search')}}" class="mr-auto" id="form_my">
            <input class="form-control " id="address" type="text" name="search" placeholder="Dove vuoi andare?" value="{{old('search')}}" required>
            <input id="lat-value" type="text" name="latitude" placeholder="latitude" value="{{ old('latitude')}}" hidden>
            <input id="lng-value" type="text" name="longitude" placeholder="longitude" value="{{ old('longitude')}}" hidden>
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            </div>
          </div>
        </div>
      <video class="d-lg-block" autoplay loop muted>
      <source src="https://raw.githubusercontent.com/solodev/hero-search-bar/master/images/hero-video.mp4" type="video/mp4">
      </video>
      </section>

        <!-- SPONSOR HOUSE -->
        <div class="contenitore-y pt-5 pb-5">
                <div class="container-fluid relat pt-5 pb-5">
                    <!-- IMAGE CAROUSEL BASE -->
                    <div id="multi-item-example" class="carousel  my_padding_evidence_x" data-ride="carousel" data-interval="0">
                        <!--CONTROL LEFT-->
                        @if(count($evidence_apartments) > 4)
                            <div class="controls-top move_me_my left-butt">
                                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                            </div>
                        @endif

                        <div class="carousel-inner" role="listbox">

                            <!--FIRST PAGE-->
                            <div class="carousel-item active">

                                @for ($i=0; $i < 4; $i++)

                                    @if (empty($evidence_apartments[$i]))
                                        <div class="col-lg-3 mb-3 mb-lg-0" style="float:left">
                                        </div>
                                    @else

                                        <div class="col-lg-3 mb-3 mb-lg-0 my_shadow" style="float:left">
                                            <a href="{{ route('show' , $evidence_apartments[$i]->id)}}">
                                            <div class="my_fix my_strong my_blue_text "> IN EVIDENZA <i class="fas fa-medal"></i></div>
                                            <div class="hover hover-2 text-white"><img class="relative" src="{{asset('storage') . '/' . $evidence_apartments[$i]->image_path}}" alt="">
                                                <div class="hover-overlay"></div>
                                                <div class="hover-2-content px-5 py-4">
                                                    <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">{{$evidence_apartments[$i]->title}}</span></h3>
                                                    <p class="hover-2-description text-uppercase mb-0">{{$evidence_apartments[$i]->address}}</p>
                                                </div>
                                            </div>
                                            </a>
                                        </div>


                                    @endif
                                @endfor


                            </div>

                            @if(count($evidence_apartments) > 4)
                                <div class="carousel-item">

                                    @for ($i=4; $i < 8; $i++)

                                        @if (empty($evidence_apartments[$i]))
                                            <div class="col-lg-3 mb-3 mb-lg-0" style="float:left">
                                            </div>
                                        @else

                                            <div class="col-lg-3 mb-3 mb-lg-0 my_shadow" style="float:left">
                                                <a href="{{ route('show' , $evidence_apartments[$i]->id)}}">
                                                <div class="my_fix my_strong my_blue_text "> IN EVIDENZA <i class="fas fa-medal"></i></div>
                                                <div class="hover hover-2 text-white"><img class="relative" src="{{asset('storage') . '/' . $evidence_apartments[$i]->image_path}}" alt="">
                                                    <div class="hover-overlay"></div>
                                                    <div class="hover-2-content px-5 py-4">
                                                        <h3 class="hover-2-title text-uppercase font-weight-bold mb-0"> <span class="font-weight-light">{{$evidence_apartments[$i]->title}}</span></h3>
                                                        <p class="hover-2-description text-uppercase mb-0">{{$evidence_apartments[$i]->address}}</p>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>


                                        @endif
                                    @endfor
                                </div>
                            @endif


                        </div>
                        <!--CONTROL RIGHT-->
                        @if(count($evidence_apartments) > 4)
                            <div class="controls-top move_me_my right_butt">
                                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        @endif
                    </div>
                    <!--END CAROUSEL BASE-->
                </div>

        </div>

        <!-- END SPONSOR HOUSE -->

        <!-- OTHER HOUSE SECTION -->
        <div class="contenitore-x pt-5 pb-5">
            <div class="container">

                <h4 class="text-center">Altri appartamenti che potrebbero interessarvi</h4>
                <div id="carouselExampleControls" class="carousel slide carousel-multi-item mt-5" data-ride="carousel" data-interval="0" >
                    <div class="carousel-inner" role="listbox">
                        <!--FIRST PAGE-->
                        <div class="carousel-item active mb-3">

                            @for ($i=0; $i < 4; $i++)
                                @if (empty($no_promo_apartments[$i]))
                                    <div class="col-md-3" style="float:left">
                                    </div>
                                @else
                                    <div class="col-md-3  my_shadow  move_to_center" style="float:left">
                                        <ul class="gallery caption-3">
                                            <li>
                                                <figure>
                                                    <a href="{{ route('show' , $no_promo_apartments[$i]->id)}}">
                                                        <img class="random_user_house_img"
                                                             src="{{asset('storage') . '/' . $no_promo_apartments[$i]->image_path}}" alt="Card image cap">
                                                        <figcaption>
                                                        </figcaption>
                                                    </a>
                                                </figure>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            @endfor

                        </div>
                        <!--END FIRST PAGE-->

                        <!--SECOND PAGE-->
                        <div class="carousel-item mb-3">

                            @for ($i=4; $i < 8; $i++)
                                @if (empty($no_promo_apartments[$i]))
                                    <div class="col-md-3 " style="float:left">
                                    </div>
                                @else
                                    <div class="col-md-3 my_shadow move_to_center" style="float:left">
                                        <ul class="gallery caption-3">
                                            <li>
                                                <figure>
                                                    <a href="{{ route('show' , $no_promo_apartments[$i]->id)}}">
                                                        <img class="random_user_house_img"
                                                             src="{{asset('storage') . '/' . $no_promo_apartments[$i]->image_path}}" alt="Card image cap">
                                                        <figcaption>
                                                        </figcaption>
                                                    </a>
                                                </figure>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            @endfor


                        </div>
                        <!--END SECOND PAGE-->
                    </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class=" arrow_next_move_sx arrow_next_move_small_sx " aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class=" arrow_next_move arrow_next_move_small" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
                  </a>
                </div>

                @if(count($no_promo_apartments) > 8)
                <div id="sliderimage2" class="carousel slide carousel-multi-item d-none d-sm-none d-md-none d-lg-block" data-ride="carousel" data-interval="0" >
                    <div class="carousel-inner" role="listbox">
                        <!--FIRST PAGE-->
                        <div class="carousel-item active">

                            @for ($i=8; $i < 12; $i++)
                                @if (empty($no_promo_apartments[$i]))
                                    <div class="col-md-3" style="float:left">
                                    </div>
                                @else
                                    <div class="col-md-3  my_shadow move_to_center" style="float:left">
                                        <ul class="gallery caption-3 ">
                                            <li>
                                                <figure>
                                                    <a href="{{ route('show' , $no_promo_apartments[$i]->id)}}">
                                                        <img class="random_user_house_img"
                                                             src="{{asset('storage') . '/' . $no_promo_apartments[$i]->image_path}}" alt="Card image cap">
                                                        <figcaption>
                                                        </figcaption>
                                                    </a>
                                                </figure>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            @endfor

                        </div>
                        <!--END FIRST PAGE-->

                        @if(count($no_promo_apartments) > 12)
                            <!--SECOND PAGE-->
                                <div class="carousel-item">

                                    @for ($i=12; $i < 16; $i++)
                                        @if (empty($no_promo_apartments[$i]))
                                            <div class="col-md-3 " style="float:left">
                                            </div>
                                        @else
                                            <div class="col-md-3 my_shadow move_to_center" style="float:left">
                                                <ul class="gallery caption-3 move_to_center">
                                                    <li>
                                                        <figure>
                                                            <a href="{{ route('show' , $no_promo_apartments[$i]->id)}}">
                                                                <img class="random_user_house_img"
                                                                     src="{{asset('storage') . '/' . $no_promo_apartments[$i]->image_path}}" alt="Card image cap">
                                                                <figcaption>
                                                                </figcaption>
                                                            </a>
                                                        </figure>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    @endfor


                                </div>
                                <!--END SECOND PAGE-->
                        @endif
                    </div>
                  <a class="carousel-control-prev" href="#sliderimage2" role="button" data-slide="prev">
                    <span class=" arrow_next_move_sx " aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#sliderimage2" role="button" data-slide="next">
                    <span class="arrow_next_move " aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
                  </a>
                </div>
                    @endif
            </div>
        </div>



        <!-- END OTHER HOUSE SECTION -->

        <!-- ABOUT US -->
        <section class="my_spacing pt-5 pb-5">
          <div class="col-md-12">
            <div id="carouselExample" class="carousel slide custom_we_are" data-ride="carousel" data-interval="2000">
              <ol class="carousel-indicators">
                <li data-target="#carouselExample" data-slide-to="0" class="active ">
                  <img class="rounded-circle" src="{{asset('images/oliver.jpg')}}" alt="First slide">
                </li>
                <li data-target="#carouselExample" data-slide-to="1"class="">
                  <img class="rounded-circle we_are_img" src="{{asset('images/Ale2.jpg')}}" alt="Second slide">
                </li>
                <li data-target="#carouselExample" data-slide-to="2" class=" ">
                  <img class="rounded-circle we_are_img" src="{{asset('images/Io.jpg')}}" alt="Third slide">
                </li>
                <li data-target="#carouselExample" data-slide-to="3" class="">
                  <img class="rounded-circle we_are_img" src="{{asset('images/Nico.jpg')}}" alt="Third slide">
                </li>
                <li data-target="#carouselExample" data-slide-to="4"class="">
                  <img class="rounded-circle we_are_img" src="{{asset('images/andy2.jpg')}}" alt="Third slide">
                </li>
              </ol>

            <div class="carousel-inner we_are_padding">
              <div class="carousel-item active">
                <blockquote class="blockquote">
                OLIVER BENOIT
                </blockquote>
                <small>
                Back-end developer
                </small>
              </div>

              <div class="carousel-item">
                <blockquote class="blockquote">
                ALESSANDRO CAPANNA
                </blockquote>
                <small>
                Back-end developer
                </small>
              </div>

              <div class="carousel-item">
                <blockquote class="blockquote">
                GIANPIERO INVERNIZZI
                </blockquote>
                <small>
                Front-end developer
                </small>
              </div>

              <div class="carousel-item">
                <blockquote class="blockquote">
                NICOLO' PAGANELLI
                </blockquote>
                <small>
                Back-end developer
                </small>
              </div>

              <div class="carousel-item">
                <blockquote class="blockquote">
                ANDY UKPE
                </blockquote>
                <small>
                Front-end developer
                </small>
              </div>
            </div>
            </div>
          </div>
        </section>
      </main>
      <!-- Main End -->

    {{--  Script relativo ad Algolia  --}}
    <script>
        (function() {
            var placesAutocomplete = places({
                appId: 'plNO17G18F5R',
                apiKey: '9bc42c41773997040e2daf6810f20401',
                container: document.querySelector('#address')
            });

            placesAutocomplete.on('change', function(e) {
                document.querySelector('#lat-value').value = e.suggestion.latlng.lat
            });

            placesAutocomplete.on('change', function(e) {
                document.querySelector('#lng-value').value = e.suggestion.latlng.lng
            });

            placesAutocomplete.on('clear', function() {
                document.querySelector('#lat-value').value = '';
                document.querySelector('#lng-value').value = '';
                document.querySelector('#address').value = '';
            });

        })();
    </script>
    {{-- Fine Script relativo ad Algolia  --}}

@endsection

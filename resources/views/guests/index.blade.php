@extends('layouts.app')

@section('head')
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>


    <style>
        .ap-icon-pin,.ap-icon-clear {
            display: none;
        }
    </style>

@endsection


@section('content')
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <h1>Benvenuto</h1>
    <div>
        <h2>Lista appartmenti</h2>

        @foreach ($apartments as $apartment)
            @if ($apartment->visible)
                <ul>
                    <li><img src="{{asset('storage') . '/' . $apartment->image_path}}" alt="appartamento"></li>
                    <li>Titolo: {{$apartment->title}}</li>
                    <li><a href="{{ route('show' , $apartment->id)}}">Visualizza</a></li>
                </ul>
            @endif
        @endforeach
    </div> -->

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
        <section>
          <div class="container-fluid relat">
            <h2 class="text-center my_strong title_space_around my_blue_text">IN EVIDENZA</h2>
            <!-- IMAGE CAROUSEL BASE -->
            <div id="multi-item-example" class="carousel slide carousel-multi-item title_space_around" data-ride="carousel" data-interval="3000">
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
                          <div class="col-md-3" style="float:left">
                          </div>
                      @else
                          <div class="col-md-3 my_shadow " style="float:left">
                              <div class="my_fix my_strong my_blue_text col-md-4 offset-md-6"> IN EVIDENZA <i class="fas fa-medal"></i></div>
                              <ul class="gallery caption-3">
                                <li>
                                  <figure>
                                  <a href="#">
                                    <img class="card-img-top relative my_img_max"
                                         src="{{asset('storage') . '/' . $evidence_apartments[$i]->image_path}}" alt="Card image cap">
                                    <figcaption>
                                      <h4 class="card-title text-center  text-uppercase">{{$evidence_apartments[$i]->title}}</h4>
                                      {{-- <a class="btn btn-success spacing_my">Guarda ora</a> --}}
                                    </figcaption>
                                  </a>
                                  </figure>
                                </li>
                          </div>


                      @endif
                @endfor


              </div>

              @if(count($evidence_apartments) > 4)
              <div class="carousel-item">

                  @for ($i=4; $i < 8; $i++)

                      @if (empty($evidence_apartments[$i]))
                          <div class="col-md-3" style="float:left">
                          </div>
                      @else
                        <div class="col-md-3 my_shadow " style="float:left">
                            <div class="my_fix my_strong my_blue_text col-md-4 offset-md-6"> IN EVIDENZA <i class="fas fa-medal"></i></div>
                            <ul class="gallery caption-3">
                              <li>
                                <figure>
                                <a href="#">
                                  <img class="card-img-top relative my_img_max"
                                       src="{{asset('storage') . '/' . $evidence_apartments[$i]->image_path}}" alt="Card image cap">
                                  <figcaption>
                                    <h4 class="card-title text-center  text-uppercase">{{$evidence_apartments[$i]->title}}</h4>
                                    {{-- <a class="btn btn-success spacing_my">Guarda ora</a> --}}
                                  </figcaption>
                                </a>
                                </figure>
                              </li>
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
        </section>
        <!-- END SPONSOR HOUSE -->
        <!-- OTHER HOUSE SECTION -->
        <section>
          <div class="container get_away_from_me">
            <hr>
            <h3 class=" text-center my_strong my_blue_text">ALTRE CASE DAI NOSTRI UTENTI</h3>
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel" data-interval="2000">
              <div class="carousel-inner" role="listbox">
                <!--FIRST PAGE-->
                <div class="carousel-item active">

                    @for ($i=0; $i < 4; $i++)
                      @if (empty($no_promo_apartments[$i]))
                          <div class="col-md-3" style="float:left">
                          </div>
                      @else
                        <div class="col-md-3" style="float:left">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                     src="{{asset('storage') . '/' . $no_promo_apartments[$i]->image_path}}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title text-center my_blue_text text-capitalize">{{$no_promo_apartments[$i]->title}}</h4>
                                    <p class="card-text my_blue_text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                                    <a class="btn btn-success spacing_my">Guarda ora</a>
                                </div>
                            </div>
                        </div>
                      @endif
                    @endfor



                </div>
                <!--END FIRST PAGE-->

                <!--SECOND PAGE-->
                <div class="carousel-item">

                    @for ($j=4; $j < 8; $j++)
                      @if (empty($no_promo_apartments[$j]))
                          <div class="col-md-3" style="float:left">
                          </div>
                      @else
                        <div class="col-md-3" style="float:left">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                     src="{{asset('storage') . '/' . $no_promo_apartments[$j]->image_path}}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title text-center my_blue_text text-capitalize">{{$no_promo_apartments[$j]->title}}</h4>
                                    <p class="card-text my_blue_text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                                    <a class="btn btn-success spacing_my">Guarda ora</a>
                                </div>
                            </div>
                        </div>
                      @endif
                    @endfor


                </div>
                <!--END SECOND PAGE-->
              </div>
            </div>

            <hr>
          </div>
        </section>
        <!-- END OTHER HOUSE SECTION -->
        <!-- ABOUT US -->
        <section class="my_spacing">
          <div class="col-md-12">
            <h2 class="text-center my_strong my_blue_text">CHI SIAMO</h2>
            <div id="carouselExample" class="carousel slide " data-ride="carousel" data-interval="400">
              <ol class="carousel-indicators">
                <li data-target="#carouselExample" data-slide-to="0" class="active d-none d-md-block">
                  <img class="rounded-circle" src="{{asset('images/oliver.jpg')}}" alt="First slide">
                </li>
                <li data-target="#carouselExample" data-slide-to="1"class=" d-none d-md-block">
                  <img class="rounded-circle" src="{{asset('images/Ale2.jpg')}}" alt="Second slide">
                </li>
                <li data-target="#carouselExample" data-slide-to="2" class=" d-none d-md-block">
                  <img class="rounded-circle" src="{{asset('images/Io.jpg')}}" alt="Third slide">
                </li>
                <li data-target="#carouselExample" data-slide-to="3" class=" d-none d-md-block">
                  <img class="rounded-circle" src="{{asset('images/Nico.jpg')}}" alt="Third slide">
                </li>
                <li data-target="#carouselExample" data-slide-to="4"class=" d-none d-md-block">
                  <img class="rounded-circle" src="{{asset('images/andy2.jpg')}}" alt="Third slide">
                </li>
              </ol>

            <div class="carousel-inner">
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

@extends('layouts.app')

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
        <!-- JUMBO W SEARCHBAR -->
        <div class="container-fluid my_remove ">
          <div class="row">
            <!-- searcbar position aboslute to carousel-jumbo -->
            <div class="absolute d-none d-lg-block">
              <form class="form-inline mr-auto">
                <input class="form-control mr-sm-2" type="text" placeholder="Dove andiamo?" aria-label="Dove andiamo?">
                <button class="btn btn-warning" type="submit">Go!</button>
              </form>
            </div>
            <div class="col-md-12 ">
              <div class="carousel slide relative " data-ride="carousel">
                <div class="carousel-inner">
                  <!-- IMG 1 -->
                  <div class="carousel-item active" data-interval="10000">
                    <img class="img-fluid" src="{{asset('images/mare.png')}}" alt="">
                  </div>
                  <!-- IMG 2 -->
                  <div class="carousel-item" data-interval="2000">
                    <img class="img-fluid" src="{{asset('images/montagna.png')}}" alt="">
                  </div>
                  <!-- IMG 3 -->
                  <div class="carousel-item">
                    <img class="img-fluid" src="{{asset('images/spazio.jpg')}}" alt="">
                  </div>
                </div>
                  <!-- Carousel control hidden -->
                  <a class="carousel-control-prev" role="button" data-slide="prev">
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" role="button" data-slide="next">
                  <span class="sr-only">Next</span>
                  </a>
                  <!-- End Carousel control hidden -->
              </div>
            </div>
          </div>
        </div>
        <!-- SPONSOR HOUSE -->
        <section>
          <div class="container-fluid relat">
            <h2 class="text-center my_strong title_space_around">IN EVIDENZA</h2>
            <!-- IMAGE CAROUSEL BASE -->
            <div id="multi-item-example" class="carousel slide carousel-multi-item title_space_around" data-ride="carousel">
              <!--CONTROL LEFT-->
              <div class="controls-top move_me_my left-butt">
                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
              </div>
              <div class="carousel-inner" role="listbox">
              <!--FIRST PAGE-->
              <div class="carousel-item active">
                @foreach ($apartments as $apartment)
                <div class="col-md-3 my_shadow " style="float:left">
                  <div class="my_fix my_strong"> IN EVIDENZA <i class="fas fa-medal"></i></div>
                    <div class="card mb-2">
                      <img class="card-img-top relative"
                      src="{{asset('storage') . '/' . $apartment->image_path}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">{{$apartment->title}}</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                </div>
                @endforeach
              </div>
              </div>
            </div>
            <!--END CAROUSEL BASE-->
          </div>
        </section>
        <!-- END SPONSOR HOUSE -->
        <!-- OTHER HOUSE SECTION -->
        <section>
          <div class="container get_away_from_me">
            <hr>
            <h3 class=" text-center my_strong">ALTRE CASE DAI NOSTRI UTENTI</h3>
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <!--FIRST PAGE-->
                <div class="carousel-item active">
                  <div class="col-md-3" style="float:left">
                   <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Recco</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Rapallo</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Portofino</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                   <div class="col-md-3" style="float:left">
                   <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Livorno</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!--END FIRST PAGE-->

                <!--SECOND PAGE-->
                <div class="carousel-item">

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Alghero</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Sassari</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Verona</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Paullo</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!--END SECOND PAGE-->
              </div>
            </div>
            <div id="multi-item-example" class="carousel slide carousel-multi-item get_away_from_me" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <!--FIRST PAGE-->
                <div class="carousel-item active">
                  <div class="col-md-3" style="float:left">
                   <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Recco</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Rapallo</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Portofino</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                   <div class="col-md-3" style="float:left">
                   <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Livorno</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!--END FIRST PAGE-->

                <!--SECOND PAGE-->
                <div class="carousel-item">

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Alghero</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Sassari</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Verona</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3" style="float:left">
                    <div class="card mb-2">
                      <img class="card-img-top"
                        src="{{asset('images/casa.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h4 class="card-title text-center">Paullo</h4>
                        <p class="card-text">Ho scritto del testo a caso tanto per fare spessore nel contenuto della card, quindi ciao!</p>
                        <a class="btn btn-success spacing_my">Guarda ora</a>
                      </div>
                    </div>
                  </div>
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
            <h2 class="text-center my_strong">CHI SIAMO</h2>
            <div id="carouselExample" class="carousel slide " data-ride="carousel">
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

@endsection

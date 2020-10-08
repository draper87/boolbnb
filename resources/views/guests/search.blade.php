@extends('layouts.jumbo')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"
            integrity="sha512-zT3zHcFYbQwjHdKjCu6OMmETx8fJA9S7E6W7kBeFxultf75OPTYUJigEKX58qgyQMi1m1EgenfjMXlRZG8BXaw=="
            crossorigin="anonymous"></script>

    <style>
        .hero {
            background-image: url("images/sfondo.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .hero--video {
            min-height: 300px !important;
        }
    </style>
@endsection

@section('content')

    <!-- Main Start -->
    <main>
        <section class="hero hero--video">
            <div class="container ">
                <div class="col-12">
                    <div class="search">

                        <form action="{{route('search')}}" class="mr-auto" id="form_my">
                            <input id="address" type="text" name="address" placeholder="Dove vuoi andare?"
                                   value="{{isset($datasearch)? $datasearch : null}}" required>
                            <input id="lat-value" type="text" name="latitude" placeholder="latitude"
                                   value="{{isset($latitude)? $latitude : old('latitude')}}" hidden>
                            <input id="lng-value" type="text" name="longitude" placeholder="longitude"
                                   value="{{isset($longitude)? $longitude : old('longitude')}}" hidden>
                            <button class='bottone'><i class="fa fa-search"></i></button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!-- SEARCH BAR -->
        <!-- RESULT -->

        <div id="scroll" class="contenitore">
            <div class="custom-box search-nav">
                <div class="container-fluid">
                    <div class="row">
                        <h3 class="pb-3">FILTRI DI RICERCA</h3>
                        <div id="tv" class="search_box col-md-auto">
                            <div>
                                <ul>
                                    <li class="pb-2">
                                        <label for="rooms"><i class="fas fa-door-open"></i> Numero stanze <span
                                                id="roomsvalue"></span></label>
                                        <div><input type="range" class="slider-filter" id="rooms" min="1" max="9" step="1"
                                                    value="2"></div>
                                    </li>
                                    <li class="pb-2">
                                        <label for="beds"><i class="fas fa-bed option_icon"></i> Numero letti <a id="bedsvalue"></a></label>
                                        <div><input type="range" class="slider-filter" id="beds" min="1" max="9" step="1"
                                                    value="1">
                                        </div>

                                    </li>
                                    <li class="pb-2">
                                        <label for="kmradius"><i class="fas fa-map-marker-alt"></i> Raggio
                                            di ricerca <a id="kmradiusvalue"></a><span>km</span></label>
                                        <div><input type="range" class="slider-filter" id="kmradius" min="2" max="200"
                                                    step="2" value="20">
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <ul class="">

                                    <li class="">
                                        <input type="checkbox" id="wifi" value="">
                                        <label for="s1">Wifi <i class="fas fa-wifi extra_icon"></i></label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="car" value="">
                                        <label for="car">Posto macchina <i class="fas fa-parking extra_icon"></i></label>
                                    </li>
                                    <li class="">
                                        <input type="checkbox" id="piscina" value="">
                                        <label for="piscina">Piscina <i class="fas fa-swimmer extra_icon"></i></label>
                                    </li>
                                    <li class="">
                                        <input type="checkbox" id="portineria" value="">
                                        <label for="portineria">Portineria <i class="fas fa-concierge-bell extra_icon"></i></label>
                                    </li>
                                    <li class="">
                                        <input type="checkbox" id="sauna" value="">
                                        <label for="sauna">Sauna <i class="fas fa-hot-tub extra_icon"></i></label>
                                    </li>
                                    <li class="">
                                        <input type="checkbox" id="vistamare" value="">
                                        <label for="vistamare">Vista mare <i class="fas fa-water"></i></label>
                                    </li>
                                </ul>
                            </div>



                            <button class='bottone filter'><i class="fas fa-filter"></i> Filtra</button>


                        </div>
                    </div>
                </div>
            </div>


            <div class="custom-box risultati">
                <div class="lista container col-{breakpoint}-auto text-white">

                </div>
            </div>
        </div>
    </main>
    <!-- Main End -->

    {{--          Sezione relativa ad Handlebars             --}}
    <script id="entry-templatenopromo" type="text/x-handlebars-template">
    <a href="/apartments/@{{ id }}">
                <div class="row card_box">
                    <div class="immagine">
                        <img class="circle" src="{{asset('storage')}}/@{{image_path}}" alt="appartamento">
                    </div>
                    <div class="testo">
                        <p class="text-capitalize"><b>@{{ title }}</b></p>
                        <div><span class=""><i class="fas fa-door-open"></i> @{{ rooms }} </span></div>
                        <div><span class=""><i class="fas fa-bed option_icon"></i> @{{ beds }} </span></div>
                        <div><span class=""><i class="fas fa-toilet"></i> @{{ bathrooms }} </span></div>
                        <div><span class=""><i class="fas fa-home""></i> @{{ square }} m<sup>2</sup></span></div>
                        <div><span class="">@{{ address }} </span></div>
                    </div>
                </div></a>


    </script>

    <script id="entry-templatepromo" type="text/x-handlebars-template">
    <a href="/apartments/@{{ id }}">
                <div class="row backround_evidence_my card_box">
                    <div class="immagine">
                        <img class="circle" src="{{asset('storage')}}/@{{image_path}}" alt="appartamento">
                    </div>
                    <div class="testo">
                        <span class="badge-dorato my_strong my_blue_text">IN EVIDENZA<i class="fas fa-medal"></i></span>
                        <p class="text-capitalize"><b>@{{ title }}</b></p>
                        <div><span class=""><i class="fas fa-door-open"></i> @{{ rooms }} </span></div>
                        <div><span class=""><i class="fas fa-bed option_icon"></i> @{{ beds }} </span></div>
                        <div><span class=""><i class="fas fa-toilet"></i> @{{ bathrooms }} </span></div>
                        <div><span class=""><i class="fas fa-home""></i> @{{ square }} m<sup>2</sup></span></div>
                        <div><span class="">@{{ address }} </span></div>
                    </div>
                </div></a>


    </script>


    {{--          Fine Sezione relativa ad Handlebars             --}}

    {{--  Script relativo ad Algolia  --}}
    <script src="{{asset('js/search.js')}}"></script>
    <script>

        (function () {
            var placesAutocomplete = places({
                appId: 'plNO17G18F5R',
                apiKey: '9bc42c41773997040e2daf6810f20401',
                container: document.querySelector('#address')
            });

            placesAutocomplete.on('change', function (e) {
                document.querySelector('#lat-value').value = e.suggestion.latlng.lat
            });

            placesAutocomplete.on('change', function (e) {
                document.querySelector('#lng-value').value = e.suggestion.latlng.lng
            });

            placesAutocomplete.on('clear', function () {
                document.querySelector('#lat-value').value = '';
                document.querySelector('#lng-value').value = '';
                document.querySelector('#address').value = '';
            });

        })();
    </script>
    {{--  Script relativo ad Algolia  --}}

@endsection

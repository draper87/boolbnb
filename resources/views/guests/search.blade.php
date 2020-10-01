@extends('layouts.app')

@section('head')
        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js" integrity="sha512-zT3zHcFYbQwjHdKjCu6OMmETx8fJA9S7E6W7kBeFxultf75OPTYUJigEKX58qgyQMi1m1EgenfjMXlRZG8BXaw==" crossorigin="anonymous"></script>
@endsection

@section('content')

    <!-- Main Start -->
    <main>
        <!-- SEARCH BAR -->
        <section>
            <div class="container-fluid my_section_padding">
                <div class="container main-search background_my text-white">
                    <div class="search_box more_space_my">
                        <input id="address" type="text" name="address" placeholder="Dove vuoi andare?" value="{{ old('address')}}" required>
                        <input id="lat-value" type="text" name="latitude" placeholder="latitude" value="{{ old('latitude')}}" hidden>
                        <input id="lng-value" type="text" name="longitude" placeholder="longitude" value="{{ old('longitude')}}" hidden>
                        <div>
                            <label for="rooms">Numero stanze:</label>
                            <input type="range" id="rooms" min="1" max="9" step="1" value="3">
                            <a id="roomsvalue"></a>
                        </div>
                        <div>
                            <label for="beds"><i class="fas fa-bed option_icon"></i> Numero letti:</label>
                            <input type="range" id="beds" min="1" max="9" step="1" value="2">
                            <a id="bedsvalue"></a>
                        </div>
                        <div>
                            <label for="kmradius"><i class="fas fa-map-marker-alt option_icon add_red_my"></i> Raggio di ricerca (km):</label>
                            <input type="range" id="kmradius" min="2" max="200" step="2" value="20">
                            <a id="kmradiusvalue"></a>
                        </div>
                        <div>
                            <label for="wifi"><i class="fas fa-wifi extra_icon"></i> Wifi: </label>
                            <input type="checkbox" id="wifi" value="">
                        </div>
                        <div>
                            <label for="car"><i class="fas fa-parking extra_icon"></i> Posto macchina: </label>
                            <input type="checkbox" id="car" value="">
                        </div>
                        <div>
                            <label for="piscina"><i class="fas fa-swimmer extra_icon"></i> Piscina </label>
                            <input type="checkbox" id="piscina" value="">
                        </div>
                        <div>
                            <label for="portineria"><i class="fas fa-concierge-bell extra_icon"></i> Portineria </label>
                            <input type="checkbox" id="portineria" value="">
                        </div>
                        <div>
                            <label for="sauna"><i class="fas fa-hot-tub extra_icon"></i> Sauna </label>
                            <input type="checkbox" id="sauna" value="">
                        </div>
                        <div>
                            <label for="vistamare"><i class="fas fa-water"></i> Vista mare </label>
                            <input type="checkbox" id="vistamare" value="">
                        </div>
                        <button class="btn_search btn-warning" id='bottone'>Search</button>
                    </div>

                </div>
            </div>
        </section>
        <!-- RESULT -->
        <section>
            <div class="lista container extra_padding">

            </div>
        </section>
    </main>
    <!-- Main End -->

    {{--          Sezione relativa ad Handlebars             --}}
    <script id="entry-template" type="text/x-handlebars-template">
    <a href="/apartments/@{{ id }}">
                <div class="row my_padding">
                    <div class="col-sm-3">
                        <img class="circle" src="{{asset('storage')}}/@{{image_path}}" alt="appartamento">
                    </div>
                    <div class="col-sm-9">
                        <p><b>@{{ title }}</b></p>
                        <span>Stanze @{{ rooms }} </span>
                        <span>Letti @{{ beds }} </span>
                        <span>Bagni @{{ bathrooms }} </span>
                        <span>Metri quadri @{{ square }} </span>
                        <span>Stanze @{{ address }} </span>
                        <span>Stanze @{{ id }} </span>
                    </div>
                </div></a><br>
    </script>


    <script src="{{asset('js/search.js')}}" ></script>
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
@endsection

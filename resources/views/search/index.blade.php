<head>
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js" integrity="sha512-zT3zHcFYbQwjHdKjCu6OMmETx8fJA9S7E6W7kBeFxultf75OPTYUJigEKX58qgyQMi1m1EgenfjMXlRZG8BXaw==" crossorigin="anonymous"></script>
    <title></title>
</head>

<form autocomplete="off">

    <label for="address">Dove vuoi andare?</label>
    <input id="address" type="text" name="address" placeholder="address" value="{{ old('address')}}" required>

    <label for="latitude" hidden>Latitude</label>
    <input id="lat-value" type="text" name="latitude" placeholder="latitude" value="{{ old('latitude')}}" hidden>

    <label for="longitude" hidden>Longitude</label>
    <input id="lng-value" type="text" name="longitude" placeholder="longitude" value="{{ old('longitude')}}" hidden>

    <div>
        <label for="rooms">Numero stanze:</label>
        <input type="range" id="rooms" min="1" max="9" step="1" value="3">
        <a id="roomsvalue"></a>
    </div>

    <div>
        <label for="beds">Numero letti:</label>
        <input type="range" id="beds" min="1" max="9" step="1" value="2">
        <a id="bedsvalue"></a>
    </div>

    <div>
        <label for="kmradius">Raggio di ricerca (km):</label>
        <input type="range" id="kmradius" min="2" max="200" step="2" value="20">
        <a id="kmradiusvalue"></a>
    </div>

    <div>
        <label for="wifi">Wifi: </label>
        <input type="checkbox" id="wifi" value="">
    </div>

    <div>
        <label for="car">Posto macchina: </label>
        <input type="checkbox" id="car" value="">
    </div>

    <div>
        <label for="piscina">Piscina </label>
        <input type="checkbox" id="piscina" value="">
    </div>

    <div>
        <label for="portineria">Portineria </label>
        <input type="checkbox" id="portineria" value="">
    </div>

    <div>
        <label for="sauna">Sauna </label>
        <input type="checkbox" id="sauna" value="">
    </div>

    <div>
        <label for="vistamare">Vista mare </label>
        <input type="checkbox" id="vistamare" value="">
    </div>



    <div><input id="bottone" type="submit" value="Invia"></div>


</form>

<div class="lista">


</div>

{{--          Sezione relativa ad Handlebars             --}}
<script id="entry-template" type="text/x-handlebars-template">
    <h2>@{{ title }}</h2>
    <p>@{{ id }}</p>
    <p>Stanze @{{ rooms }}</p>
    <p>Letti @{{ beds }}</p>
    <p>Bagni @{{ bathrooms }}</p>
    <p>Metri quadri @{{ square }}</p>
    <p>Indirizzo @{{ address }}</p>
    <img src="{{asset('storage')}}/@{{image_path}}" alt="appartamento">
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

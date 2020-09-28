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
<input id="lat-value" type="text" name="latitude" placeholder="latitude" value="{{ old('latitude')}}" >

<label for="longitude" hidden>Longitude</label>
<input id="lng-value" type="text" name="longitude" placeholder="longitude" value="{{ old('longitude')}}" >

<input id="bottone" type="submit" value="Invia">

</form>

<div class="lista">


</div>

{{--          Sezione relativa ad Handlebars             --}}
<script id="entry-template" type="text/x-handlebars-template">
    <h2>@{{ title }}</h2>
    <p>Stanze @{{ rooms }}</p>
    <p>Letti @{{ beds }}</p>
    <p>Bagni @{{ bathrooms }}</p>
    <p>Metri quadri @{{ square }}</p>
    <p>Indirizzo @{{ address }}</p>
    <img src="@{{image_path}}" alt="appartamento">
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

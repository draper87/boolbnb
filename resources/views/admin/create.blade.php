<head>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script src="https://cdn.jsdelivr.net/algoliasearch/3.31/algoliasearchLite.min.js"></script>
    <title></title>
</head>


<h1>Crea nuovo appartamento</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('admin.apartments.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <label for="title">Titolo</label>
    <input type="text" name="title" placeholder="title" value="{{ old('title')}}" required>

    <label for="rooms">Rooms</label>
    <input type="number" name="rooms" placeholder="rooms" value="{{ old('rooms')}}" required>

    <label for="beds">Beds</label>
    <input type="number" name="beds" placeholder="beds" value="{{ old('beds')}}" required>

    <label for="bathrooms">bathrooms</label>
    <input type="number" name="bathrooms" placeholder="bathrooms" value="{{ old('bathrooms')}}" required>

    <label for="square">square</label>
    <input type="number" name="square" placeholder="square" value="{{ old('square')}}" required>

    <label for="image_path">image_path</label>
    <input type="file" name="image_path" placeholder="image_path" accept="image/*">

    <label for="address">address</label>
    <input id="address" type="text" name="address" placeholder="address" value="{{ old('address')}}" required>

    <label for="longitude">Longitude</label>
    <input id="lng-value" type="text" name="longitude" placeholder="longitude" value="{{ old('longitude')}}" required>

    <label for="latitude">Latitude</label>
    <input id="lat-value" type="text" name="latitude" placeholder="latitude" value="{{ old('latitude')}}" required>

    @foreach ($facilities as $facility)
        <div>
            <input type="checkbox" name="facilities[]" value="{{ $facility->id }}">
            <span>{{ $facility->facility }}</span>
        </div>
    @endforeach

    <input type="submit" value="Invia">
</form>

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

        // parte relativa alla funzione locate me
        placesAutocomplete.on('locate', function() {

            var places = algoliasearch.initPlaces('plNO17G18F5R', '9bc42c41773997040e2daf6810f20401');

            function updateForm(response) {
                var hits = response.hits;
                var suggestion = hits[0];

                console.log(suggestion);

                if (suggestion && suggestion.locale_names && suggestion.city) {
                    placesAutocomplete.setVal(suggestion.locale_names.default[0] + ' ' + suggestion.city.default[0]);
                }
            }

            navigator.geolocation.getCurrentPosition(function (response) {
                var coords = response.coords;
                lat = coords.latitude.toFixed(6);
                lng = coords.longitude.toFixed(6);

                places.reverse({
                    aroundLatLng: lat + ',' + lng,
                    hitsPerPage: 1
                }).then(updateForm);
            });


        });

    })();
</script>

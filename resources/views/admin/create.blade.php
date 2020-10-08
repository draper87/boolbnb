@extends('layouts.app')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script src="https://cdn.jsdelivr.net/algoliasearch/3.31/algoliasearchLite.min.js"></script>
@endsection

@section('content')

    <div class="container">

    <div class="row">
      <div class="offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10">
        <div class="ms_form">
          <!-- inizio titolo -->
            <div>
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <h1>IL TUO APPARTAMENTO</h1>
              </div>
              <!-- In caso di errore -->
                  @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  @endif
              <!--END - In caso di errore -->
            </div>
          <!-- fine titolo -->
          <!-- inizio form -->
          <form action="{{ route('admin.apartments.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
            <!-- inizio righe titolo e camere -->
            <div class="form-group row">
              <div class="col-lg-6">
                  <label for="title">Titolo</label><br>
                  <input class="form-control" type="text" name="title" placeholder="Titolo" value="{{ old('title')}}" required>
              </div>
              <div class="col-lg-6">
                  <label for="rooms">Stanze</label><br>
                  <input class="form-control" type="number" name="rooms" placeholder="Stanze" value="{{ old('rooms')}}" required>
              </div>
            </div>
            <!-- fine righe titolo e camere -->

            <!-- inizio righe letti e bagni -->
            <div class="form-group row">
              <div class="col-lg-6">
                  <label for="beds">Letti</label><br>
                  <input class="form-control" type="number" name="beds" placeholder="Letti" value="{{ old('beds')}}" required>
              </div>
              <div class="col-lg-6">
                  <label for="bathrooms">Bagni</label><br>
                  <input class="form-control" type="number" name="bathrooms" placeholder="Bagni" value="{{ old('bathrooms')}}" required>
              </div>
            </div>
            <!-- fine righe letti e bagni -->

            <!-- inizio input metri quadri -->
            <div class="form-group row">
              <div class="col-lg-12">
                  <label for="square">Metri quadri</label><br>
                  <input class="form-control" type="number" name="square" placeholder="Metri quadri" value="{{ old('square')}}" required>
              </div>
            </div>
            <!-- fine input metri quadri -->

            <!-- inizio descrizione-->
            <div class="form-group row">
              <div class="col-lg-12">
                  <label for="descrizione">Descrizione</label><br>
                  <textarea class="form-control" type="text" name="descrizione" placeholder="Descrizione" required>{{ old('descrizione')}}</textarea>
              </div>
            </div>
            <!-- fine descrizione-->

            <!-- inizio input immagine -->
            <div class="form-group row">
              <div class="col-lg-12">
                  <label for="image_path">Carica immagine</label><br>
                  <input type="file" name="image_path" placeholder="Image_path" accept="image/*" required>
              </div>
            </div>
            <!-- fine input immagine -->
            <!-- inizio indirizzo -->
            <div class="form-group row">
              <div class="col-lg-12">
                  <label for="address">Indirizzo</label><br>
                  <input class="form-control" id="address" type="text" name="address" placeholder="Indirizzo" value="{{ old('address')}}" required>
              </div>
            </div>
            <!-- fine riga indirizzo -->
            <!-- inizio riga latitudine e longitudine -->

              <div class="form-group row" hidden>
                <div class="col-lg-6">
                    <label for="longitude">Longitude</label><br>
                    <input class="form-control" id="lng-value" type="text" name="longitude" placeholder="Longitude" value="{{ old('longitude')}}" required>
                </div>
                <div class="col-lg-6">
                    <label for="latitude">Latitude</label><br>
                    <input class="form-control" id="lat-value" type="text" name="latitude" placeholder="Latitude" value="{{ old('latitude')}}" required>
                </div>
              </div>

            <!-- fine riga latitudine e longitudine -->
            <!-- inizio check box -->
            <div class="row">
              <div class="col-12">
                <h5>Servizi:</h5>
              </div>
            </div>
            <div class="form-group row">
                @foreach ($facilities as $facility)

                  <div class="offset-lg-1 col-lg-3">
                    <input class="form-check-input" type="checkbox" name="facilities[]" value="{{ $facility->id }}">
                    <label class="text-capitalize" for="facilities[]">{{ $facility->facility }}</label>
                  </div>

                @endforeach
            </div>
            <!-- fine check-box -->
            <!-- inizio button -->
            <div class="form-group row">
              <div class="offset-lg-10 col-lg-2">
                <input class="btn btn-success" type="submit" value="Invia i dati">
              </div>
            </div>
            <!-- fine button -->
          </form>
          <!-- fine form -->
        </div>
      </div>
    </div>
  </div>




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

@endsection

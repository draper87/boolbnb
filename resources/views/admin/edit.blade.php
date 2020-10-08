@extends('layouts.app')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script src="https://cdn.jsdelivr.net/algoliasearch/3.31/algoliasearchLite.min.js"></script>
@endsection

@section('content')
<main>
  <div class="container">

    <!-- inizio form -->
    <div class="row">
      <div class="offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10">
        <div class="ms_form">
          <!-- inizio titolo -->
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <h1>Modifica i dati del tuo appartamento</h1>
            </div>
            <!-- in caso di errore -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- END in caso di errore -->
          </div>
          <!-- fine titolo -->
          <form action="{{ route('admin.apartments.update' , $apartment) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
            <!-- inizio input titolo e camere -->
              <div class="form-group row">
                <div class="col-lg-6">
                  <label for="title">Titolo</label>
                  <input class="form-control" type="text" name="title" placeholder="Titolo" value="{{ isset($apartment->title)? $apartment->title : old('title')}}" required>
                </div>
                <div class="col-lg-6">
                  <label for="rooms">Stanze</label>
                  <input class="form-control" type="number" name="rooms" placeholder="Stanze" value="{{ isset($apartment->rooms)? $apartment->rooms : old('rooms')}}" required>
                </div>
              </div>
            <!-- fine input titolo e camere -->
            <!-- inizio input letti e bagni -->
              <div class="form-group row">
                <div class="col-lg-6">
                  <label for="beds">Letti</label>
                  <input class="form-control" type="number" name="beds" placeholder="Letti" value="{{ isset($apartment->beds)? $apartment->beds : old('beds')}}" required>
                </div>
                <div class="col-lg-6">
                  <label for="bathrooms">Bagni</label>
                  <input class="form-control" type="number" name="bathrooms" placeholder="Bagni" value="{{ isset($apartment->bathrooms)? $apartment->bathrooms : old('bathrooms')}}" required>
                </div>
              </div>
            <!-- fine input letti e bagni -->
            <!-- inizio input metri quadri -->
              <div class="form-group row">
                <div class="col-lg-12">
                  <label for="square">Metri quadri</label>
                  <input class="form-control" type="number" name="square" placeholder="Metri quadri" value="{{ isset($apartment->square)? $apartment->square : old('square')}}" required>
                </div>
              </div>
            <!-- fine input metri quadri -->
            <!-- inizio descrizione-->
              <div class="form-group row">
                <div class="col-lg-12">
                  <label for="descrizione">Descrizione</label><br>
                  <textarea class="form-control" type="text" name="descrizione" placeholder="descrizione" required >{{ isset($apartment->descrizione)? $apartment->descrizione : old('descrizione')}}</textarea>
                </div>
              </div>
            <!-- fine descrizione-->
            <!-- inizio input immagine -->
              <div class="form-group row">
                <div class="col-lg-12">
                  <label for="image_path">Carica immagine</label><br>
                  <input type="file" name="image_path" placeholder="Image_path" accept="image/*">
                </div>
              </div>
            <!-- fine input immagine -->
            <!-- inizio indirizzo -->
              <div class="form-group row">
                <div class="col-lg-12">
                  <label for="address">Indirizzo</label>
                  <input id="address" class="form-control" type="text" name="address" placeholder="Indirizzo" value="{{ isset($apartment->address)? $apartment->address : old('address')}}" required>
                </div>
              </div>
            <!-- fine indirizzo -->
            <!-- inizio riga latitudine e longitudine -->

              <div class="form-group row" hidden>
                <div class="col-lg-6">
                  <label for="longitude">Longitude</label>
                  <input class="form-control" type="text" name="longitude" placeholder="longitude" value="{{ isset($apartment->longitude)? $apartment->longitude :old('longitude')}}" required>
                </div>
                <div class="col-lg-6">
                  <label for="latitude">Latitude</label>
                  <input class="form-control" type="text" name="latitude" placeholder="latitude" value="{{ isset($apartment->latitude)? $apartment->latitude :old('latitude')}}" required>
                </div>
              </div>

            <!-- fine riga latitudine e longitudine -->
            <!-- inizio checkbox -->
            <div class="row">
              <div class="col-12">
                <h5>Servizi:</h5>
              </div>
            </div>
            <div class="form-group row">
              @foreach ($facilities as $facility)
                  <div class="offset-lg-1 col-lg-3">
                      <input type="checkbox" name="facilities[]" {{ ($apartment->facilities->contains($facility)) ? 'checked' : '' }} value="{{ $facility->id }}">
                      <label class="text-capitalize" for="facilities[]">{{ $facility->facility }}</label>
                  </div>
              @endforeach
            </div>
            <!-- fine checkbox -->
            <!-- inizio checkbox nascondi-->
            <div class="form-group row">
              <div class="col-lg-12">
                <input type="checkbox" name="visible" {{ ($apartment->visible) ? '' : 'checked' }} value="check">
                <label>Nascondi</label>
              </div>
            </div>
            <!-- fine checkbox nascondi -->
            <!-- inizio button -->
            <div class="form-group row">
              <div class="offset-lg-10 col-lg-2">
                <input class="btn btn-success" type="submit" value="Invia i dati">
              </div>
            </div>
          <!-- fine button -->
        </form>
      </div>
    </div>
  <!-- fine form -->
</div>
</div>
</main>


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

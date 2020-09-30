<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <title></title>

</head>


<ul>
  <li><img src="{{asset('storage') . '/' . $apartment->image_path}}" alt="appartamento"></li>
  <li>{{$apartment->title}}</li>
  <li>Camere: {{$apartment->rooms}}</li>
  <li>Letti: {{$apartment->beds}}</li>
  <li>Bagni: {{$apartment->bathrooms}}</li>
  <li>Metri quadri: {{$apartment->square}}</li>
  <li>Indirizzo: {{$apartment->address}}</li>
  <li>servizi:
    @foreach ($facilities as $facility)
        <div>
            <input onclick="return false;" type="checkbox" name="facilities[]" {{ ($apartment->facilities->contains($facility)) ? 'checked' : '' }} value="{{ $facility->id }}">
            <span>{{ $facility->facility }}</span>
        </div>
    @endforeach
  </li>
</ul>

<a href="{{ route('admin.stat_show', $apartment) }}">Visualizza statistiche</a>
<a href="{{ route('admin.promo', $apartment) }}">Sponsorizza</a>

<div id="mapid" style="height: 300px; width: 500px"></div>

<script>
    var map = L.map('mapid', {
        center: [{{$apartment->latitude}}, {{$apartment->longitude}}],
        zoom: 12
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    }).addTo(map);

    L.marker([{{$apartment->latitude}}, {{$apartment->longitude}}]).addTo(map)
        .bindPopup('{{$apartment->title}}')
        .openPopup();
</script>

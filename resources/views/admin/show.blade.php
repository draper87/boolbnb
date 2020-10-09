@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
@endsection

@section('content')

    <main>
        <div class="container-fluid bottom-img_my my_remove">
            <div class="apartment-img">
                <img class="img-fluid" src="{{asset('storage') . '/' . $apartment->image_path}}" alt="">
            </div>
        </div>
        <div class="main_show">
            <div class="container">
                <hr>
                <div class="row">
                    <!-- DESCRIPTION -->
                    <div class="col-xs-12 col-md-12 col-lg-7">
                        <div class="title">
                            <h3 class="address-map my_strong">{{$apartment->title}}</h3>
                            <p class="host_name text-capitalize">HOST: {{$apartment->user->firstname}} {{$apartment->user->lastname}} </p>
                        </div>
                        <div class="description">
                            <h4 class="bottom-img_my my_strong">DESCRIZIONE</h4>
                            <p>
                              {{$apartment->descrizione}}
                            </p>
                        </div>
                    </div>
                    <!-- SERVICE AND UTILITY -->
                    <div class="col-xs-12 col-md-12 col-lg-5">
                        <div class="service_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-12 card_box">
                                        <div class="card_title bottom-img_my my_strong">
                                            <h5>INFO</h5>
                                        </div>
                                        <ul class="list_box">
                                            <li class="list_service">
                                                <span>{{$apartment->square}} mq.</span>
                                                <i class="fas fa-home"></i>
                                            </li>
                                            <li class="list_service">
                                                <span>{{$apartment->rooms}} stanze</span>
                                                <i class="fas fa-door-open"></i>
                                            </li>
                                            <li class="list_service">
                                                <span>{{$apartment->beds}} letti</span>
                                                <i class="fas fa-bed"></i>
                                            </li>
                                            <li class="list_service">
                                                <span>{{$apartment->bathrooms}} bagni</span>
                                                <i class="fas fa-toilet"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-5 offset-md-2 col-lg-12 offset-lg-0 card_box">
                                        <div class="card_title bottom-img_my my_strong">
                                            <h5>SERVIZI</h5>
                                        </div>
                                        <ul class="list_box">
                                            @foreach ($facilities as $facility)
                                                <li class="list_service">
                                                    <label class="label_container">
                                                        {{ $facility->facility }}
                                                        <input class="checkbox" onclick="return false;" type="checkbox" name="facilities[]" {{ ($apartment->facilities->contains($facility)) ? 'checked' : '' }} value="{{ $facility->id }}">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center options">
                        <a class="btn" href="{{ route('admin.stat_show', $apartment) }}">
                            Statistiche
                        </a>
                        <a class="btn" href="{{ route('admin.promo', $apartment) }}">
                            Sponsorizza
                        </a>
                    </div>
                    <div class="map_container">
                        <div id="mapid" style="height: 400px; width: 90%"></div>
                    </div>
                    <div class="col-lg-12 text-center options">
                        <a class="btn" href="{{ route('admin.apartments.edit' , $apartment->id) }}">
                            Modifica <i class="far fa-edit"></i>
                        </a>
                        <form action="{{route('admin.apartments.destroy', $apartment)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit" value="Elimina">Elimina <i class="fas fa-skull"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
@endsection

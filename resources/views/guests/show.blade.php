@extends('layouts.app')

@section('head')
    <head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
              integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
              crossorigin=""/>
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                crossorigin=""></script>
        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

    </head>

@endsection

@section('content')

    @if ($apartment->visible)
    <!-- Main Start -->
    <main>
        <!-- DETAIL IMAGE FULL WIDTH -->
        <div class="container-fluid bottom-img_my my_remove">
            <img class="img-fluid" src="{{asset('storage') . '/' . $apartment->image_path}}" alt="">
        </div>
        <div class="main_show">
            <div class="container">
                <hr>
                <div class="row">
                    <!-- DESCRIPTION -->
                    <div class="col-xs-12 col-md-7">
                        <img class="img_show" src="" alt="">
                        <h3 class="address-map text-center my_strong my_custom_title">{{$apartment->title}}</h3>
                        <p class="host_name text-center">HOST: {{$apartment->user->firstname}} {{$apartment->user->lastname}} </p>
                        <h3 class=" text-center bottom-img_my my_strong">DESCRIZIONE</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <!-- SERVICE AND UTILITY -->
                    <div class="col-xs-12 col-md-5">
                        <div class="service_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 card_box">
                                        <div class="card_title  bottom-img_my  my_strong"> <h4 class=" text-center">INFO </h4> </div>
                                        <ul class="list_box">
                                            <li class="list_service"><i class="fas fa-home"></i><span> {{$apartment->square}}</span></li>
                                            <li class="list_service"><i class="fas fa-door-open"></i> {{$apartment->rooms}}</li>
                                            <li class="list_service"><i class="fas fa-bed"></i> {{$apartment->beds}}</li>
                                            <li class="list_service"><i class="fas fa-toilet"></i> {{$apartment->bathrooms}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-md-12 card_box">
                                        <div class="card_title  bottom-img_my  my_strong"> <h4 class=" text-center">SERVIZI </h4> </div>
                                        <ul class="list_box">
                                            @foreach ($facilities as $facility)
                                                <li class="list_service">
                                                    <input  onclick="return false;" type="checkbox" name="facilities[]" {{ ($apartment->facilities->contains($facility)) ? 'checked' : '' }} value="{{ $facility->id }}">
                                                    <span>{{ $facility->facility }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 container">
                        <div id="mapid" style="height: 300px; width: 500px"></div>
                        <a class="btn btn-danger d-flex justify-content-center bottom-img_my" href="...">Contatta l'Host!</a>
                    </div>

                    <div>
                        <form action="{{ route('send') }}" method="post">

                            @csrf
                            @method('POST')
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="email" value="{{old('email')}}" required>

                            <label for="messagge">Messaggio</label>
                            <input type="text" name="messagge" placeholder="messagge" value="{{ old('messagge')}}" required>

                            <input type="text" name="apartment_id" placeholder="apartment_id" value="{{ $apartment->id }}" hidden>



                            <input type="submit" value="Invia">
                        </form>
                    </div>


                </div>
            </div>
        </div>

        @else
            <div class="container">
                <h2>Appartamento non visibile</h2>
            </div>
        @endif

    </main>


    <!-- Main End -->

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

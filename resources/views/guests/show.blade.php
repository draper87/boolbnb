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
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

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
{{--                        <a class="btn btn-danger d-flex justify-content-center bottom-img_my" href="...">Contatta l'Host!</a>--}}
                    </div>

                    <div class="text-center">
                        <form action="{{ route('send') }}" method="post">

                            @csrf
                            @method('POST')
                            <label for="email" hidden>Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Email" value="{{old('email')}}" required>

                            <label for="messagge" hidden>Messaggio</label>
                            <textarea class="form-control" name="messagge" placeholder="Inserisci messaggio" value="{{ old('messagge')}}" required rows="4" cols="50"></textarea>

                            <input class="form-control" type="text" name="apartment_id" placeholder="apartment_id" value="{{ $apartment->id }}" hidden>

                            <input class="btn btn-primary mt-1" type="submit" value="Invia">
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

    @if(!empty($messaggio))
        <head>

            <!-- Parte relativa all avviso di messaggio inviato -->
            <script src="{{asset('js/avviso.js')}}"></script>
            <style>
                body {
                    font-family: 'Varela Round', sans-serif;
                }
                .modal-confirm {
                    color: #636363;
                    width: 325px;
                    font-size: 14px;
                }
                .modal-confirm .modal-content {
                    padding: 20px;
                    border-radius: 5px;
                    border: none;
                }
                .modal-confirm .modal-header {
                    border-bottom: none;
                    position: relative;
                }
                .modal-confirm h4 {
                    text-align: center;
                    font-size: 26px;
                    margin: 30px 0 -15px;
                }
                .modal-confirm .form-control, .modal-confirm .btn {
                    min-height: 40px;
                    border-radius: 3px;
                }
                .modal-confirm .close {
                    position: absolute;
                    top: -5px;
                    right: -5px;
                }
                .modal-confirm .modal-footer {
                    border: none;
                    text-align: center;
                    border-radius: 5px;
                    font-size: 13px;
                }
                .modal-confirm .icon-box {
                    color: #fff;
                    position: absolute;
                    margin: 0 auto;
                    left: 0;
                    right: 0;
                    top: -70px;
                    width: 95px;
                    height: 95px;
                    border-radius: 50%;
                    z-index: 9;
                    background: #82ce34;
                    padding: 15px;
                    text-align: center;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
                }
                .modal-confirm .icon-box i {
                    font-size: 58px;
                    position: relative;
                    top: 3px;
                }
                .modal-confirm.modal-dialog {
                    margin-top: 80px;
                }
                .modal-confirm .btn {
                    color: #fff;
                    border-radius: 4px;
                    background: #82ce34;
                    text-decoration: none;
                    transition: all 0.4s;
                    line-height: normal;
                    border: none;
                }
                .modal-confirm .btn:hover, .modal-confirm .btn:focus {
                    background: #6fb32b;
                    outline: none;
                }
                .trigger-btn {
                    display: inline-block;
                    margin: 100px auto;
                }
            </style>
        </head>
            <!-- Button HTML (to Trigger Modal) -->
            <a id='avviso' href="#myModal" class="trigger-btn" data-toggle="modal" hidden>Click to Open Confirm Modal</a>
        <!-- Modal HTML -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xE876;</i>
                        </div>
                        <h4 class="modal-title w-100">Inviato!</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Il messaggio è stato inviato correttamente.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fine Parte relativa all avviso di messaggio inviato -->

    @endif


@endsection

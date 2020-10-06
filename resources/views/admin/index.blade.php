@extends('layouts.app')

@section('head')

    <style>
        #bachecajumbo {
            background-image: linear-gradient(319deg, #663dff 0%, #aa00ff 37%, #cc4499 100%);
            color: whitesmoke;
        }

        #bachecajumbo a {
            color: white;
        }

        form {
            display: inline-block;
            padding: 0;
            margin: 0;
        }
        form input {
            margin: 0;
            padding: 0;
        }

        img {
            height: 350px;
            min-width: 400px;
        }

        .bacheca {
          margin: 0 auto;
          display: inline-flex;
          justify-content: space-evenly;
          flex-wrap: wrap;

        }
        .bacheca span:first-of-type {
            padding-right: 3px;
        }

        .card-bacheca {
          margin-bottom: 20px;
          position: relative;
          background: #333;
          width: 400px;
          height: 600px;
          border-radius: 6px;
          padding: 2rem;
          color: #aaa;
          box-shadow: 0 0.25rem 0.25rem rgba(0, 0, 0, 0.2), 0 0 1rem rgba(0, 0, 0, 0.2);
          overflow: hidden;

        }
        .card span {
            padding-right: 1em;
        }
        .card__image-container {
            margin: -2rem -2rem -2rem -2rem;
        }
        .card__title {
            color: white;
            margin-top: 0;
            font-size: 25px;
            letter-spacing: 0.01em;
        }
        .card__content {
            margin-top: -1rem;
            opacity: 0;
            font-size: 18px;
            animation: ContentFadeIn .8s 1.6s forwards;
        }
        .card__svg {
            position: absolute;
            left: 0;
            top: 115px;
        }
        @keyframes ContentFadeIn {
            0% {
                transform: translateY(-1rem);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @media screen and (min-device-aspect-ratio: 21/9) {
                    .card-bacheca {
                      height: 650px;
                    }
                }


    </style>

@endsection

@section('content')
    <main>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <div>
            <div id="bachecajumbo" class="container-fluid text-center my_welcome_padding mb-5">
                <h1 class="text-capitalize">Benvenuto {{$user->firstname}}</h1>

                <h5>Qui puoi trovare i tuoi appartmenti</h5>

                <div class="d-inline">
                    <a class="btn-bacheca mt-2 draw-border" href="{{ route('admin.apartments.create') }}">Crea nuovo
                        appartamento</a>
                </div>

                <div class="d-inline">
                    <a class="btn-bacheca mt-2 draw-border" href="{{ route('admin.message') }}">Visualizza messaggi</a>
                </div>
            </div>

            <div class="bacheca">
            @foreach ($apartments as $apartment)
{{--                <div class="container my_apartment_padding">--}}
{{--                    <div class="row my_padding">--}}
{{--                        <div class="col-sm-3">--}}
{{--                            <img class="circle new_rules" src="{{asset('storage') . '/' . $apartment->image_path}}"--}}
{{--                                 alt="appartamento">--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-9 my_left_spacing">--}}
{{--                            <h4><b>Titolo: {{$apartment->title}}</b></h4>--}}
{{--                            <p><a href="{{ route('admin.apartments.show' , $apartment->id)}}">--}}
{{--                                    <button type="button" class="btn btn-success mb-2">Visualizza</button>--}}
{{--                                </a>--}}
{{--                                <a href="{{ route('admin.apartments.edit' , $apartment->id)}}">--}}
{{--                                    <button type="button" class="btn btn-primary mb-2">Modifica</button>--}}
{{--                                </a>--}}
{{--                            <form action="{{route('admin.apartments.destroy', $apartment)}}" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <input class="btn btn-outline-danger mb-2" type="submit" name="" value="ELIMINA">--}}
{{--                            </form>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                </div>--}}
                <div class="card-bacheca">
                    <div class="card__image-container">
                        <img class="card__image" src="{{asset('storage') . '/' . $apartment->image_path}}" alt="">
                    </div>

                    <svg class="card__svg" viewBox="0 0 800 500">

                        <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#333"/>
                        <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="pink" stroke-width="3" fill="transparent"/>
                    </svg>

                    <div class="card__content">
                        <h1 class="card__title text-capitalize">{{$apartment->title}}</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta dolor praesentium at quod autem omnis, amet eaque unde perspiciatis adipisci possimus quam facere illo et quisquam quia earum nesciunt porro.</p>
                        <span><a class="btn btn-outline-success" href="{{ route('admin.apartments.show' , $apartment->id)}}"><i class="fas fa-eye"></i></a></span><span><a class="btn btn-outline-info" href="{{ route('admin.apartments.edit' , $apartment->id)}}"><i class="far fa-edit"></i></a></span>
                                <form action="{{route('admin.apartments.destroy', $apartment)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit" name="" value="Elimina"><i class="fas fa-skull"></i></button>
                                </form>
                    </div>
                </div>
            @endforeach
            </div>

        </div>
    </main>

@endsection

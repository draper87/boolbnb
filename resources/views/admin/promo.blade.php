@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/paybutton.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        body {
            font-family: 'Varela Round', sans-serif;
        }
        .modal-confirm {
            color: #636363;
            width: 325px;
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
            background: #ef513a;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }
        .modal-confirm .icon-box i {
            font-size: 56px;
            position: relative;
            top: 4px;
        }
        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #ef513a;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }
        .modal-confirm .btn:hover, .modal-confirm .btn:focus {
            background: #da2c12;
            outline: none;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
@endsection

@section('content')

    @if ($time_ending < $now || $time_ending == false)

        <!-- Main Start -->

        <main class="text-center">
            <!-- Payment simulation -->
            <section>
                <div class="container">
                    <div class="row">
                        <!-- inizio headline -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h1 class="space_my_payment text-gray ms_title_margin mt-3">Tre pacchetti
                                per mettere subito inevidenza i tuoi risultati di ricerca.</h1>
                        </div>
                        <!-- fine headline -->

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <form class="ms_cards" method="post" id="payment-form"
                                  action="{{ route('admin.checkout', $apartment) }}">
                                @csrf
                                @method('POST')


                                <div class="form-row justify-content-center align-content-center">
                                    <div class="col-sm-12 col-md-12 col-lg-6 mt-5">
                                        <!-- select promo -->
                                        <label>Seleziona promo</label><br>
                                        <select id="promo_selected" name="promo_selected"
                                                class="custom-select mb-2">
                                            <option default="">Seleziona promo</option>
                                            @foreach ($promos as $promo)
                                                <option data-price="{{ $promo->price }}"
                                                        value="{{ $promo->id }}">{{ $promo->name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- fine select promo -->

                                        <label for="amount">
                                            <span class="input-label">Importo</span>
                                            <div class="input-wrapper amount-wrapper">
                                                <input class="form-control" id="amount" name="amount" type="tel"
                                                       min="1" placeholder="Amount" value="" readonly>
                                            </div>
                                        </label>

                                    </div>
                                </div>

                                <div class="bt-drop-in-wrapper container col-sm-12 col-md-12 col-lg-6 mt-2">

                                    <div id="bt-dropin"></div>

                                    <input id="nonce" name="payment_method_nonce" type="hidden"/>

                                    <div class="paybutton mt-5 mb-5 mx-auto">
                                        <button class="left-side" type="submit">
                                            <div class="card">
                                                <div class="card-line"></div>
                                                <div class="buttons"></div>
                                            </div>
                                            <div class="post">
                                                <div class="post-line"></div>
                                                <div class="screen">
                                                    <div class="dollar">€</div>
                                                </div>
                                                <div class="numbers"></div>
                                                <div class="numbers-line2"></div>
                                            </div>
                                        </button>
                                        <div class="right-side">
                                            <div class="new">Paga ora</div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <hr>

            <!-- Plane description -->
            <section>
                <div class="container">
                    <div class="ms_container_flex">
                        @foreach($promos as $promo)
                            <div class="ms_flex_item ms_cards">
                                <h2 class=" font-weight-bold ms_promo_decor text-center ms_position_relative"><span
                                        class="ms_position_centered">{{$promo->name}}h</span></h2>
                                <p class="text-center">Metti in evidenza il <br> tuo appartamento
                                    per<br> {{$promo->timing}} ore</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- CUSTOMER REVIEVV -->
            <section class="ms_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center carousel-title space_my_h1 font-weight-bold text-gray ms_title_margin">
                                Ecco cosa dicono i nostri clienti:</h1>
                        </div>
                        <div class="col-md-12">
                            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-md-2 offset-md-2">
                                                <img class="rounded-circle" src="icon.png" alt="First slide">
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <blockquote class="blockquote">
                                                    “I'm the one that's got to die when it's time for me to die, so let
                                                    me live my life the way I want to.”
                                                </blockquote>
                                                <small>
                                                    -Jimi Hendrix
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-md-2 offset-md-2">
                                                <img class="rounded-circle" src="icon3.jpg" alt="First slide">
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <blockquote class="blockquote">
                                                    "There are no limits, you are only limited by however far you want
                                                    to be limited"
                                                </blockquote>
                                                <small>
                                                    -Chuck Schuldiner
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-md-2 offset-md-2">
                                                <img class="rounded-circle" src="icon2.jpg" alt="First slide">
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <blockquote class="blockquote">
                                                    "We live to avoid death. We exist to avoid nonexistence."
                                                </blockquote>
                                                <small>
                                                    -Peter Steele
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Carousel control -->
                                <a class="carousel-control-prev my_orange" href="#carouselExample" role="button"
                                   data-slide="prev">
                                    <i class="fas fa-chevron-circle-left fa-2x"></i>
                                </a>
                                <a class="carousel-control-next my_orange" href="#carouselExample" role="button"
                                   data-slide="next">
                                    <i class="fas fa-chevron-circle-right fa-2x"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Main End -->

        <script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
        <script>

            var form = document.querySelector('#payment-form');
            var client_token = "{{ $token }}";

            braintree.dropin.create({
                    authorization: client_token,
                    selector: '#bt-dropin',
                },
                function (createErr, instance) {
                    if (createErr) {
                        console.log('Create Error', createErr);
                        return;
                    }
                    form.addEventListener('submit', function (event) {
                        event.preventDefault();

                        instance.requestPaymentMethod(function (err, payload) {
                            if (err) {
                                console.log('Request Payment Method Error', err);
                                return;
                            }

                            // Add the nonce to the form and submit
                            document.querySelector('#nonce').value = payload.nonce;
                            form.submit();
                        });
                    });
                });

            // istruzioni per forzare il refresh della pagina quando si preme il tasto indietro del browser
            window.addEventListener("pageshow", function (event) {
                var historyTraversal = event.persisted ||
                    (typeof window.performance != "undefined" &&
                        window.performance.navigation.type === 2);
                if (historyTraversal) {
                    // Handle page restore.
                    window.location.reload();
                }
            });

        </script>

    @else
        @foreach ($apartment->promos as $promo)
            <script src="{{asset('js/avviso.js')}}"></script>
            <a id='avviso' href="#myModal" class="trigger-btn" data-toggle="modal" hidden>Click to Open Confirm Modal</a>
            <!-- Modal HTML -->
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box">
                                <i class="material-icons">&#xE5CD;</i>
                            </div>
                            <h4 class="modal-title w-100">Attenzione!</h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Hai già la {{ $promo->name }} attiva. Scade il {{ $data_scadenza }}</p>
                        </div>
                        <div class="modal-footer">
                            <button onclick="history.back();" class="btn btn-danger btn-block" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection

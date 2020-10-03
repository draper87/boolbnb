@extends('layouts.app')

@section('content')
    {{-- !isset($time_ending) ||  --}}
    @if ($time_ending < $now || $time_ending == false)

    <!-- Main Start -->

    <main class="text-center">
        <!-- Payment simulation -->
        <section>
            <div class="container">
              <div class="row">
                <!-- inizio headline -->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <h1 class="space_my_payment font-weight-bold text-gray ms_title_margin">Scopri i vantaggi della Sponsorizzazione. Tre pacchetti per mettere subito inevidenza i tuoi risultati di ricerca.</h1>
                </div>
                <!-- fine headline -->


                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                      {{--       Inizio form         --}}
                      <form class="ms_cards" method="post" id="payment-form" action="{{ route('admin.checkout', $apartment) }}">
                          @csrf
                          @method('POST')
                          <section>
                            <div class="form-row">
                              <div class="col-sm-12 col-md-12 col-lg-4 offset-lg-2 offset-xl-2">
                                <!-- select promo -->
                                <label>Seleziona promo</label><br>
                                <select id="promo_selected" name="promo_selected" class="form-control">
                                    <option default="">Seleziona promo</option>
                                    @foreach ($promos as $promo)
                                        <option data-price="{{ $promo->price }}" value="{{ $promo->id }}">{{ $promo->name }}</option>
                                    @endforeach
                                </select>
                                <!-- select promo -->
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                <!-- select promo -->
                                <label for="amount">
                                    <span class="input-label">Amount</span>
                                    <div class="input-wrapper amount-wrapper">
                                        <input class="form-control" id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="" readonly>
                                    </div>
                                </label>
                                <!-- select promo -->

                              </div>
                            </div>

                            <div class="bt-drop-in-wrapper container">
                                <div id="bt-dropin"></div>
                            </div>
                          </section>
                          <div class="row">
                            <div class="offset-sm-10 col-sm-2 offset-md-10 col-md-2 offset-lg-10 col-lg-2 offset-xl-10 col-xl-2">
                              <input id="nonce" name="payment_method_nonce" type="hidden" />
                              <button class="btn-save btn btn-warning btn-sm down_my_btn text-gray " type="submit"><span>Paga ora</span></button>
                            </div>
                          </div>

                      </form>
                      {{--       Fine form         --}}
                    </div>

                <hr>
              </div>

            </div>
        </section>
        <!-- Plane description -->
        <section>
          <div class="container">
            <div class="ms_container_flex">
                @foreach($promos as $promo)
                  <div class="ms_flex_item ms_cards">
                    <h2 class=" font-weight-bold ms_promo_decor text-center ms_position_relative"> <span class="ms_position_centered">{{$promo->name}}h</span></h2>
                    <p class="text-center">Metti in evidenza il <br> tuo appartamento per<br> {{$promo->timing}} ore</p>
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
                        <h1 class="text-center carousel-title space_my_h1 font-weight-bold text-gray ms_title_margin">Ecco cosa dicono i nostri clienti:</h1>
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
                                                “I'm the one that's got to die when it's time for me to die, so let me live my life the way I want to.”
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
                                                "There are no limits, you are only limited by however far you want to be limited"
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
                            <a class="carousel-control-prev my_orange" href="#carouselExample" role="button" data-slide="prev">
                                <i class="fas fa-chevron-circle-left fa-2x"></i>
                            </a>
                            <a class="carousel-control-next my_orange" href="#carouselExample" role="button" data-slide="next">
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
            paypal: {
                flow: 'vault'
            }
        }, function (createErr, instance) {
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
        window.addEventListener( "pageshow", function ( event ) {
            var historyTraversal = event.persisted ||
                ( typeof window.performance != "undefined" &&
                    window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                // Handle page restore.
                window.location.reload();
            }
        });

    </script>

    <script src="{{ asset('js/app.js') }}"></script>

    @else
        @foreach ($apartment->promos as $promo)
            <p>hai già la {{ $promo->name }} attiva. Scade il {{ $data_scadenza }}</p>
        @endforeach
    @endif

@endsection

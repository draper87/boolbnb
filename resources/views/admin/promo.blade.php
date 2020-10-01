@extends('layouts.app')

@section('content')

    @if (count($apartment->promos) == 0)

    <!-- Main Start -->

    <main class="text-center">
        <!-- Payment simulation -->
        <section>
            <div class="container">
                <h1 class="space_my_payment font-weight-bold">SPONSORIZZA ORA</h1>

                {{--       Inizio form         --}}
                <form method="post" id="payment-form" action="{{ route('admin.checkout', $apartment) }}">
                    @csrf
                    @method('POST')
                    <section>

                        <!-- select promo -->
                        <label>seleziona promo</label>
                        <select id="promo_selected" name="promo_selected">
                            <option default="">Seleziona promo</option>
                            @foreach ($promos as $promo)
                                <option data-price="{{ $promo->price }}" value="{{ $promo->id }}">{{ $promo->name }}</option>
                            @endforeach
                        </select>
                        <!-- select promo -->

                        <label for="amount">
                            <span class="input-label">Amount</span>
                            <div class="input-wrapper amount-wrapper">
                                <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="" readonly>
                            </div>
                        </label>

                        <div class="bt-drop-in-wrapper container">
                            <div id="bt-dropin"></div>
                        </div>
                    </section>

                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                    <button class="btn-save btn btn-warning btn-sm down_my_btn text-white" type="submit"><span>Paga ora</span></button>
                </form>
                {{--       Fine form         --}}


                <hr>
            </div>
        </section>
        <!-- Plane description -->
        <section>
            @foreach($promos as $promo)
                <div class="container">
                    <h2 class="font-weight-bold">{{$promo->name}}</h2>
                    <p>Metti in evidenza il tuo appartamento per {{$promo->timing}} ore</p>
                    <hr>
                </div>
            @endforeach
        </section>
        <!-- CUSTOMER REVIEVV -->
        <section>
            <div class="container my_padding">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center carousel-title space_my_h1 font-weight-bold">COSA DICONO DI NOI</h1>
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
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

    @else
        @foreach ($apartment->promos as $promo)
            <p>hai già la {{ $promo->name }} attiva. Scade il {{ $data_scadenza }}</p>
        @endforeach
    @endif

@endsection




@if (count($apartment->promos) == 0)

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
                    <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="">
                </div>
            </label>

            <div class="bt-drop-in-wrapper">
                <div id="bt-dropin"></div>
            </div>
        </section>

        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <button class="button" type="submit"><span>Test Transaction</span></button>
    </form>

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

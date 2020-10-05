// var $ = require( "jquery" );

$(document).ready(function () {

    // slider che aggiorna il numero di stanze in tempo reale
    var roomsSlider = document.getElementById("rooms");
    var roomsOutput = document.getElementById("roomsvalue");
    roomsOutput.innerHTML = roomsSlider.value; // Display the default slider value
    // Update the current slider value (each time you drag the slider handle)
    roomsSlider.oninput = function () {
        roomsOutput.innerHTML = this.value;
    }

    // slider che aggiorna il numero di letti in tempo reale
    var bedsSlider = document.getElementById("beds");
    var bedsOutput = document.getElementById("bedsvalue");
    bedsOutput.innerHTML = bedsSlider.value; // Display the default slider value
    // Update the current slider value (each time you drag the slider handle)
    bedsSlider.oninput = function () {
        bedsOutput.innerHTML = this.value;
    }

    // slider che aggiorna il numero di letti in tempo reale
    var kmRadiusSlider = document.getElementById("kmradius");
    var kmRadiusOutput = document.getElementById("kmradiusvalue");
    kmRadiusOutput.innerHTML = kmRadiusSlider.value; // Display the default slider value
    // Update the current slider value (each time you drag the slider handle)
    kmRadiusSlider.oninput = function () {
        kmRadiusOutput.innerHTML = this.value;
    }

    // dichiaro le variabili che fungeranno da parametri
    var latitude;
    var longitude;
    var rooms;
    var beds;
    var kmradius;
    var wifi;
    var car;
    var piscina;
    var portineria;
    var sauna;
    var vistamare;

    // se la ricerca parte dalla homepage faccio partire direttamente la chiamata ajax.
    if ($('#address').val() !== '') {
        latitude = $('#lat-value').val();
        longitude = $('#lng-value').val();
        rooms = $('#rooms').val();
        beds = $('#beds').val();
        kmradius = $('#kmradius').val();
        chiamaAppartamenti();
    }

    // quando clicco il bottone Invia parte la chiamata Ajax
    $('#bottone').click(function () {
        event.preventDefault(); // impedisce il submit della form, da eliminare in quanto useremo un <a> con classe btn
        latitude = $('#lat-value').val();
        longitude = $('#lng-value').val();
        rooms = $('#rooms').val();
        beds = $('#beds').val();
        kmradius = $('#kmradius').val();
        $('#wifi').is(":checked") ? wifi = 'yes' : wifi = 'no';
        $('#car').is(":checked") ? car = 'yes' : car = 'no';
        $('#piscina').is(":checked") ? piscina = 'yes' : piscina = 'no';
        $('#portineria').is(":checked") ? portineria = 'yes' : portineria = 'no';
        $('#sauna').is(":checked") ? sauna = 'yes' : sauna = 'no';
        $('#vistamare').is(":checked") ? vistamare = 'yes' : vistamare = 'no';
        chiamaAppartamenti();
    });

    // chiamata ajax
    function chiamaAppartamenti(page) {

        $.ajax({
            url: 'http://127.0.0.1:8000/api/search',
            method: 'GET',
            data: {
                longitude: longitude,
                latitude: latitude,
                rooms: rooms,
                beds: beds,
                kmradius: kmradius,
                wifi: wifi,
                car: car,
                piscina: piscina,
                portineria: portineria,
                sauna: sauna,
                vistamare: vistamare,
                page: page,
            },
            success: function (dataResponse) {
                $('.lista').html('');
                console.log(dataResponse.promo);
                console.log(dataResponse.nopromo);
                stampaAppartamentiPromo(dataResponse.promo);
                stampaAppartamentiNoPromo(dataResponse.nopromo.data);
                numeroPagina(dataResponse.nopromo.current_page, dataResponse.nopromo.last_page);
            },
            error: function () {
                alert('il server non funziona');
            }
        })
    }

    // logica per la numerazione delle pagine
    function numeroPagina(pagina, ultimaPagina) {
        let currentPage = pagina;
        if (currentPage < ultimaPagina) {
            var paginaSuccessiva = pagina + 1;
            var paginaIndietro = pagina - 1;
            console.log(paginaSuccessiva);
            $(document).on('click', '.next', function (event) {
                event.preventDefault();
                chiamaAppartamenti(paginaSuccessiva);
            });
            $(document).on('click', '.previous', function (event) {
                event.preventDefault();
                chiamaAppartamenti(paginaIndietro);
            });
        }
        if (currentPage === 1) {
            paginaSuccessiva = pagina + 1;
            $(document).on('click', '.next', function (event) {
                event.preventDefault();
                chiamaAppartamenti(paginaSuccessiva);
            });
        }
    }


    // funzione che usa handlebars per stampare i risultati no promo ottenuti dalla chiamata Ajax
    function stampaAppartamentiNoPromo(dataResponse) {
        const source = $('#entry-templatenopromo').html(); // questo e il path al nostro template html
        const template = Handlebars.compile(source); // passiamo a Handlebars il percorso del template html

        for (var i = 0; i < dataResponse.length; i++) {
            var context = dataResponse[i];
            var html = template(context);
            $('.lista').append(html);
        }
        stampaPagination();
    }

    // funzione che usa handlebars per stampare i risultati promo ottenuti dalla chiamata Ajax
    function stampaAppartamentiPromo(dataResponse) {
        const source = $('#entry-templatepromo').html(); // questo e il path al nostro template html
        const template = Handlebars.compile(source); // passiamo a Handlebars il percorso del template html

        for (var i = 0; i < dataResponse.length; i++) {
            var context = dataResponse[i];
            var html = template(context);
            $('.lista').append(html);
        }
    }

    function stampaPagination() {
        var html = "<ul class=\"pagination justify-content-center align-content-center\"><li class=\"page-item\"><a class=\"page-link previous\" href=\"#\">Indietro</a></li>" + " <li class=\"page-item\"><a class=\"page-link next\" href=\"#\">Avanti</a></li></ul>";
        $('.lista').append(html);
    }

});



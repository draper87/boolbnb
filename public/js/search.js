// var $ = require( "jquery" );

$(document).ready(function () {

    // slider che aggiorna il numero di stanze in tempo reale
    var roomsSlider = document.getElementById("rooms");
    var roomsOutput = document.getElementById("roomsvalue");
    roomsOutput.innerHTML = roomsSlider.value; // Display the default slider value
    // Update the current slider value (each time you drag the slider handle)
    roomsSlider.oninput = function() {
        roomsOutput.innerHTML = this.value;
    }

    // slider che aggiorna il numero di letti in tempo reale
    var bedsSlider = document.getElementById("beds");
    var bedsOutput = document.getElementById("bedsvalue");
    bedsOutput.innerHTML = bedsSlider.value; // Display the default slider value
    // Update the current slider value (each time you drag the slider handle)
    bedsSlider.oninput = function() {
        bedsOutput.innerHTML = this.value;
    }

    // slider che aggiorna il numero di letti in tempo reale
    var kmRadiusSlider = document.getElementById("kmradius");
    var kmRadiusOutput = document.getElementById("kmradiusvalue");
    kmRadiusOutput.innerHTML = kmRadiusSlider.value; // Display the default slider value
    // Update the current slider value (each time you drag the slider handle)
    kmRadiusSlider.oninput = function() {
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

    // quando clicco il bottone Invia parte la chiamata Ajax
    $('#bottone').click(function() {
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
        console.log(wifi);
        console.log(car);
        console.log(piscina);
        console.log(portineria);
        console.log(sauna);
        console.log(vistamare);
        chiamaAppartamenti();
    });

    // chiamata ajax
    function chiamaAppartamenti() {

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
            },
            success: function(dataResponse) {
                console.log(dataResponse);
                stampaAppartamenti(dataResponse);
            },
            error: function() {
                alert('il server non funziona');
            }
        })
    }


    // funzione che usa handlebars per stampare i risultati ottenuti dalla chiamata Ajax
    function stampaAppartamenti(dataResponse) {
        $('.lista').html('');
        const source = $('#entry-template').html(); // questo e il path al nostro template html
        const template = Handlebars.compile(source); // passiamo a Handlebars il percorso del template html

        for (var i = 0; i < dataResponse.length; i++) {
            var context = dataResponse[i];
            var html = template(context);
            $('.lista').append(html);
        }
    }

    });



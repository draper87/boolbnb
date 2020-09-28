// var $ = require( "jquery" );

$(document).ready(function () {

    // dichiaro le variabili longitudine e latitudine
    var latitude;
    var longitude;

    // quando clicco il bottone Invia parte la chiamata Ajax
    $('#bottone').click(function() {
        event.preventDefault(); // impedisce il submit della form, da eliminare in quanto useremo un <a> con classe btn
        latitude = $('#lat-value').val();
        longitude = $('#lng-value').val();
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



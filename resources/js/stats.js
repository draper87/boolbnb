var $ = require( "jquery" );


$.ajax({
    url: 'http://127.0.0.1:8000/api/stats',
    data: {
        apartment: $('#appartamento').text(),
    },
    method: 'GET',
    success: function(dataResponse) {
        var gennaio = dataResponse.gennaio.length;
        var febbraio = dataResponse.febbraio.length;
        var marzo = dataResponse.marzo.length;
        var aprile = dataResponse.aprile.length;
        var maggio = dataResponse.maggio.length;
        var giugno = dataResponse.giugno.length;
        var luglio = dataResponse.luglio.length;
        var agosto = dataResponse.agosto.length;
        var settembre = dataResponse.settembre.length;
        var ottobre = dataResponse.ottobre.length;
        var novembre = dataResponse.novembre.length;
        var dicembre = dataResponse.dicembre.length;

        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                datasets: [{
                    label: 'My First dataset',
                    // backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [gennaio, febbraio, marzo, aprile, maggio, giugno, luglio, agosto, settembre, ottobre, novembre, dicembre],
                }]
            },

            // Configuration options go here
            options: {
                layout: {
                    padding: {
                        left: 50,
                        right: 50,
                        top: 50,
                        bottom: 50
                    }
                }
            }
        });
    },
    error: function error() {
        alert('error');
    }
});

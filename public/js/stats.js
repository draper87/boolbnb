// var $ = require( "jquery" );

$( document ).ready(function() {
  // select per la gestione del tempo
  var stats = 'visualizzazioni';
  var messaggio = 'messaggi';
  printStats(6 ,stats);
  printStats(6 ,messaggio);

  //al change della select mostro le relative stats
  $( "#time_stat" ).on('change', function() {
    var numeroMesi = $('#time_stat').val();
    printStats(numeroMesi ,stats);
    printStats(numeroMesi ,messaggio);
  });


  function printStats(numeroMesiDaVisualizzare, coseDaVisualizzare){
    $.ajax({
        url: 'http://127.0.0.1:8000/api/stats',
        data: {
            apartment: $('#appartamento').text(),
            mesi: numeroMesiDaVisualizzare,
        },
        method: 'GET',
        success: function(dataResponse) {
            // NOTE: per il data
            if (coseDaVisualizzare == 'visualizzazioni') {
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
            } else if (coseDaVisualizzare == 'messaggi') {
              var gennaio = dataResponse.gennaio_messaggio.length;
              var febbraio = dataResponse.febbraio_messaggio.length;
              var marzo = dataResponse.marzo_messaggio.length;
              var aprile = dataResponse.aprile_messaggio.length;
              var maggio = dataResponse.maggio_messaggio.length;
              var giugno = dataResponse.giugno_messaggio.length;
              var luglio = dataResponse.luglio_messaggio.length;
              var agosto = dataResponse.agosto_messaggio.length;
              var settembre = dataResponse.settembre_messaggio.length;
              var ottobre = dataResponse.ottobre_messaggio.length;
              var novembre = dataResponse.novembre_messaggio.length;
              var dicembre = dataResponse.dicembre_messaggio.length;
            }



            var monthsStats = [gennaio, febbraio, marzo, aprile, maggio, giugno, luglio, agosto, settembre, ottobre, novembre, dicembre];
            var months = ["gennaio", "febbraio", "marzo", "aprile", "maggio", "giugno", "luglio", "agosto", "settembre", "ottobre", "novembre", "dicembre"];

            var today = new Date();
            var aMonth = today.getMonth();
            var arrayMesiDaPassare =[];
            var arrayValoriDaPassare =[];


            for (var i = 0; i < numeroMesiDaVisualizzare; i++) {
              arrayMesiDaPassare.push(months[aMonth]);
              arrayValoriDaPassare.push(monthsStats[aMonth]);
              aMonth = aMonth - 1;
              if (aMonth == -1) {
                aMonth = 11;
              }
            }

            var ctx = document.getElementById('myChart'+ coseDaVisualizzare).getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: arrayMesiDaPassare.reverse(),
                    datasets: [{
                        label:numeroMesiDaVisualizzare  +' mesi: ' + coseDaVisualizzare,

                        // backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: arrayValoriDaPassare.reverse(),
                    }]
                },

                // Configuration options go here
                options: {
                    layout: {
                        padding: {
                            left: 50,
                            right: 50,
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
  }

});

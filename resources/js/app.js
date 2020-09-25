require('./bootstrap');


$.ajax({
    url: 'http://127.0.0.1:8000/api/stats',
    data: {
       apartment: $('#appartamento').text(),

    },
    method: 'GET',
    success: function(dataResponse) {
        var numero = dataResponse.statistiche.length;

    },
    error: function error() {
        alert('error');
    }
});


var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
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



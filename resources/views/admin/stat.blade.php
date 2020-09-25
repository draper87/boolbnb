<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>

<h2>Statistiche relative all appartamento {{ $apartment->title }}</h2>

<div><canvas id="myChart" width="400" height="400"></canvas></div>

<div id="appartamento" hidden>{{ $apartment->id }}</div>

<script src="{{asset('js/app.js')}}" ></script>

</body>

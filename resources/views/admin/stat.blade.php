<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>

<h2>Statistiche relative all appartamento {{ $apartment->title }}</h2>

<select id="time_stat" name="">
  <option value="6">6 mesi</option>
  <option value="3">3 mesi</option>
  <option value="12">1 anno</option>
</select>

<button id="stat_start" type="button" name="button">Vedi relativo grafico</button>

<div><canvas id="myChart" width="300" height="100"></canvas></div>

<div id="appartamento" hidden>{{ $apartment->id }}</div>

<script src="{{asset('js/app.js')}}" ></script>

</body>

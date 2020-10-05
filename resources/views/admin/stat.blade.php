@extends('layouts.app')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endsection

@section('content')


    <main>
        <div class="container">

            <h2>Statistiche relative all appartamento {{ $apartment->title }}</h2>

            <select id="time_stat" name="">
              <option value="6">6 mesi</option>
              <option value="3">3 mesi</option>
              <option value="12">1 anno</option>
            </select>



            <div><canvas id="myChartVisualizzazioni" width="300" height="200"></canvas></div>
            <div><canvas id="myChartMessaggio" width="300" height="200"></canvas></div>

            <div id="appartamento" hidden>{{ $apartment->id }}</div>

            <script src="{{asset('js/stats.js')}}" ></script>

        </div>
    </main>

@endsection

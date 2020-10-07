@extends('layouts.app')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endsection

@section('content')
    <style media="screen">
      h1, h3{
        text-align: center;
        padding: 15px 0;
        color: #4d4c4e;
      }
      h3:first-of-type {
        padding-top:15px;
        margin-bottom: 0;
      }
      .time_stat {
        text-align: center;
        padding: 15px 0;
      }
      #time_stat {
        color: #6a22de;
        padding: 4px;
        font-weight: 700;
        border: 2px solid #6a22de;
        border-radius: 5px;
      }
    </style>

    <main>
        <div class="container">

            <h1>Statistiche appartamento: {{ $apartment->title }}</h1>

            <div class="time_stat">
              <select id="time_stat" name="">
                <option value="6">6 mesi</option>
                <option value="3">3 mesi</option>
                <option value="12">1 anno</option>
              </select>
            </div>



            <h3>Le tue visite</h3>
            <div class="chart"><canvas id="myChartvisualizzazioni" ></canvas></div>
            <h3>I tuoi messaggi</h3>
            <div class="chart"><canvas id="myChartmessaggi" ></canvas></div>

            <div id="appartamento" hidden>{{ $apartment->id }}</div>

            <script src="{{asset('js/stats.js')}}" ></script>

        </div>
    </main>

@endsection

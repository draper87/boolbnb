@extends('layouts.app')

@section('content')


<main>
  <div class="container">
      <div class="row no-gutters">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="ms_single_message">
            <!-- mittente -->            
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <h1>Inviato da:<br> {{$message->email}}</h1>
              </div>
            <!-- fine mittente -->
            <!-- oggetto -->
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ms_object">
                <h2 class="text-capitalize">Appartamento: {{$message->apartment->title}}</h2>
              </div>
            <!-- fine oggetto -->
            <!-- oggetto -->
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ms_text">
                <p class="text-capitalize">{{$message->message}}</p>
              </div>
            <!-- fine oggetto -->
            <div class="row">
              <div class="col-12 offset-md-4 col-md-8 offset-md-7 col-md-5 offset-lg-9 col-lg-3 offset-xl-9 col-xl-3">
                <a href="{{route('admin.message')}}" class="btn btn-info">Torna alla pagina dei messaggi</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection

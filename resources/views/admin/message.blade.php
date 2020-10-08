@extends('layouts.app')

@section('content')




<main>


          <!-- titolo Pagina -->
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <h1 class="ms_margin">Posta in Arrivo</h1>
              </div>
            </div>
          </div>
          <!-- fine titolo pagina -->

            <!--  inizio lista appartamenti -->
            <div class="container">


                @foreach($apartments as $apartment)

                  <!-- condizione -->
                  @if(count($apartment->messages) > 0)

                    <!-- inizio appartamenti -->
                    <div class="row no-gutters ">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ms_messaggio_linea">

                        <!-- inizio titolo dell'appartamento -->
                        <span class="ms_appartment_title text-center">{{$apartment->title}}</span>
                        <!-- fine titolo dell'appartamento -->


                          @foreach ($apartment->messages as $message)
                            <div class="row no-gutters ms_messaggio">
                              <!-- icona -->
                              <div class="col-sm-2 d-none d-sm-block col-md-2 col-lg-2 col-xl-2 text-center">
                                    <i class="fas fa-star"></i>
                              </div>
                              <!-- fine icona -->
                              <!-- mittente -->
                              <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <span class="ms_mittente"><b>Mittente</b>: <br> {{$message->email}} </span>
                              </div>
                              <!-- fine mittente -->
                              <!-- bottoni -->
                              <div class="col-2 offset-2 col-sm-2 offset-sm-0 col-md-2 offset-md-0 col-lg-1 offset-lg-1 col-xl-1 offset-xl-1 ">
                                <a class="btn btn-success"href="{{route('admin.message_show' , $message->id)}}"><i class="fas fa-search"></i></a>
                              </div>
                              <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1">
                                <form action="{{route('admin.message_detroy', $message->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger" type="submit" name="" value="Elimina"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                    </svg>
                                  </button>
                                </form>
                              </div>
                              <!-- fine bottoni -->
                            </div>
                          @endforeach

                      </div>
                    </div>
                    <!-- fine appartamenti -->
                  @endif
                  <!-- fine condizione -->

                @endforeach

              <!-- fine lista appartamenti -->
              @foreach ($apartment->messages as $key => $message)
                  {{$key + 1}}
              @endforeach
            </div>

</main>

@endsection

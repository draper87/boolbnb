@extends('layouts.app')

@section('content')
    @foreach ($apartment->promos as $promo)
      <style>
          body {
              font-family: 'Varela Round', sans-serif;
          }
          .modal-confirm {
              color: #636363;
              width: 325px;
          }
          .modal-confirm .modal-content {
              padding: 20px;
              border-radius: 5px;
              border: none;
          }
          .modal-confirm .modal-header {
              border-bottom: none;
              position: relative;
          }
          .modal-confirm h4 {
              text-align: center;
              font-size: 26px;
              margin: 30px 0 -15px;
          }
          .modal-confirm .form-control, .modal-confirm .btn {
              min-height: 40px;
              border-radius: 3px;
          }
          .modal-confirm .close {
              position: absolute;
              top: -5px;
              right: -5px;
          }
          .modal-confirm .modal-footer {
              border: none;
              text-align: center;
              border-radius: 5px;
              font-size: 13px;
          }
          .modal-confirm .icon-box {
              color: #fff;
              position: absolute;
              margin: 0 auto;
              left: 0;
              right: 0;
              top: -70px;
              width: 95px;
              height: 95px;
              border-radius: 50%;
              z-index: 9;
              background: #23bf23;
              padding: 15px;
              text-align: center;
              box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
          }
          .modal-confirm .icon-box span {
              font-size: 56px;
              position: relative;
              top: 4px;
          }
          .modal-confirm.modal-dialog {
              margin-top: 80px;
          }
          .modal-confirm .btn {
              color: #fff;
              border-radius: 4px;
              background: #23bf23;
              text-decoration: none;
              transition: all 0.4s;
              line-height: normal;
              border: none;
          }
          .modal-confirm .btn:hover, .modal-confirm .btn:focus {
              background: green;
              outline: none;
          }
          .trigger-btn {
              display: inline-block;
              margin: 100px auto;
          }
          main{
            height: 80vh;
          }
      </style>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

      <main></main>

      <script src="{{asset('js/avviso.js')}}"></script>
      <a id='avviso' href="#myModal" class="trigger-btn" data-toggle="modal" hidden>Click to Open Confirm Modal</a>
      <!-- Modal HTML -->
      <div id="myModal" class="modal fade">
          <div class="modal-dialog modal-confirm">
              <div class="modal-content">
                  <div class="modal-header">
                      <div class="icon-box">
                          <span class="material-icons">
                            done
                          </span>
                      </div>
                      <h4 class="modal-title w-100">Transazione eseguita.</h4>
                  </div>
                  <div class="modal-body">
                      <p class="text-center">Ora la tua {{ $promo->name }} è ora attiva. </p>
                  </div>
                  <div class="modal-footer">
                      <button onclick="window.location='{{ url("admin/apartments/$apartment->id") }}'" class="btn btn-danger btn-block" data-dismiss="modal">OK</button>
                  </div>
              </div>
          </div>
      </div>
    @endforeach
@endsection

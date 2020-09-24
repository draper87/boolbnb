<h1>Benvenuto: {{$user->firstname}}</h1>
<div>
  <h2>Lista dei </h2>
  @foreach ($apartments as $apartment)
    <ul>
      <li><img src="{{$apartment->image_path}}" alt="appartamento"></li>
      <li>Titolo: {{$apartment->title}}</li>
      <li><a href="{{ route('admin.apartments.show' , $apartment->id)}}">Visualizza</a></li>
      <li><a href="{{ route('admin.apartments.edit' , $apartment->id)}}">Modifica</a></li>
    </ul>
  @endforeach
</div>

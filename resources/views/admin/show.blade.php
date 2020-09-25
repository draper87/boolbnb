<ul>
  <li><img src="{{$apartment->image_path}}" alt="appartamento"></li>
  <li>{{$apartment->title}}</li>
  <li>Camere: {{$apartment->rooms}}</li>
  <li>Letti: {{$apartment->beds}}</li>
  <li>Bagni: {{$apartment->bathrooms}}</li>
  <li>Metri quadri: {{$apartment->square}}</li>
  <li>Indirizzo: {{$apartment->address}}</li>
  <li>servizi:
    @foreach ($facilities as $facility)
        <div>
            <input onclick="return false;" type="checkbox" name="facilities[]" {{ ($apartment->facilities->contains($facility)) ? 'checked' : '' }} value="{{ $facility->id }}">
            <span>{{ $facility->facility }}</span>
        </div>
    @endforeach
  </li>
</ul>

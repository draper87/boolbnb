<ul>
  @foreach($apartments as $apartment)
    <li>
      {{$apartment->title}}
      <ol>
        @foreach ($apartment->messages as $message)
          <li>chi ti ha scritto{{$message->email}} <a href="{{route('admin.message_show' , $message->id)}}">vedi messaggio</a> </li>
        @endforeach
      </ol>
    </li>
  @endforeach
</ul>

@foreach ($apartment->messages as $key => $message)
  {{$key + 1}}
@endforeach

@extends('layouts.app')

@section('content')


    <main>
        <div class="container">

            <ul>
                @foreach($apartments as $apartment)

                    @if(count($apartment->messages) > 0)

                        <li>
                            {{$apartment->title}}
                            <ol>
                                @foreach ($apartment->messages as $message)
                                    <li>chi ti ha scritto{{$message->email}} <a href="{{route('admin.message_show' , $message->id)}}">vedi messaggio</a> </li>
                                @endforeach
                            </ol>
                        </li>

                    @endif
                @endforeach
            </ul>

            @foreach ($apartment->messages as $key => $message)
                {{$key + 1}}
            @endforeach

        </div>
    </main>

@endsection

@extends('layouts.app')

@section('content')

    <main>
        <div class="container">

            <h1>Modifica dati appartamento</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.apartments.update' , $apartment) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="title">Titolo</label>
                <input type="text" name="title" placeholder="title" value="{{ isset($apartment->title)? $apartment->title : old('title')}}" required>

                <label for="rooms">Rooms</label>
                <input type="number" name="rooms" placeholder="rooms" value="{{ isset($apartment->rooms)? $apartment->rooms : old('rooms')}}" required>

                <label for="beds">Beds</label>
                <input type="number" name="beds" placeholder="beds" value="{{ isset($apartment->beds)? $apartment->beds : old('beds')}}" required>

                <label for="bathrooms">bathrooms</label>
                <input type="number" name="bathrooms" placeholder="bathrooms" value="{{ isset($apartment->bathrooms)? $apartment->bathrooms : old('bathrooms')}}" required>

                <label for="square">square</label>
                <input type="number" name="square" placeholder="square" value="{{ isset($apartment->square)? $apartment->square : old('square')}}" required>

                <label for="image_path">image_path</label>
                <input type="file" name="image_path" placeholder="image_path" accept="image/*">

                <label for="address">address</label>
                <input type="text" name="address" placeholder="address" value="{{ isset($apartment->address)? $apartment->address : old('address')}}" required>

                <label for="longitude">Longitude</label>
                <input type="text" name="longitude" placeholder="longitude" value="{{ isset($apartment->longitude)? $apartment->longitude :old('longitude')}}" required>

                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" placeholder="latitude" value="{{ isset($apartment->latitude)? $apartment->latitude :old('latitude')}}" required>

                @foreach ($facilities as $facility)
                    <div>
                        <input type="checkbox" name="facilities[]" {{ ($apartment->facilities->contains($facility)) ? 'checked' : '' }} value="{{ $facility->id }}">
                        <span>{{ $facility->facility }}</span>
                    </div>
                @endforeach

                <hr>

                <div>
                    <input type="checkbox" name="visible" {{ ($apartment->visible) ? '' : 'checked' }} value="check">
                    <span>Nascondi</span>
                </div>

                <input type="submit" value="Invia">
            </form>


        </div>
    </main>

@endsection








<h1>Crea nuovo appartamento</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('admin.apartments.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <label for="title">Titolo</label>
    <input type="text" name="title" placeholder="title" value="{{ old('title')}}" required>

    <label for="rooms">Rooms</label>
    <input type="number" name="rooms" placeholder="rooms" value="{{ old('rooms')}}" required>

    <label for="beds">Beds</label>
    <input type="number" name="beds" placeholder="beds" value="{{ old('beds')}}" required>

    <label for="bathrooms">bathrooms</label>
    <input type="number" name="bathrooms" placeholder="bathrooms" value="{{ old('bathrooms')}}" required>

    <label for="square">square</label>
    <input type="number" name="square" placeholder="square" value="{{ old('square')}}" required>

    <label for="image_path">image_path</label>
    <input type="file" name="image_path" placeholder="image_path" accept="image/*">

    <label for="address">address</label>
    <input type="text" name="address" placeholder="address" value="{{ old('address')}}" required>

    <label for="longitude">Longitude</label>
    <input type="text" name="longitude" placeholder="longitude" value="{{ old('longitude')}}" required>

    <label for="latitude">Latitude</label>
    <input type="text" name="latitude" placeholder="latitude" value="{{ old('latitude')}}" required>

    @foreach ($facilities as $facility)
        <div>
            <input type="checkbox" name="facilities[]" value="{{ $facility->id }}">
            <span>{{ $facility->facility }}</span>
        </div>
    @endforeach

    <input type="submit" value="Invia">
</form>

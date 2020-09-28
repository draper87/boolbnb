<?php

namespace App\Http\Controllers\Admin;

use App\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $apartments = Apartment::where('user_id', $user->id)->get();

        return view('admin.index', compact('apartments','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilities = Facility::all();
        return view('admin.create', compact('facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationData());

        $requested_data = $request->all();
        // dd($requested_data);


        $new_apartment = new Apartment();
        $new_apartment->user_id = Auth::id();
        $new_apartment->title = $requested_data['title'];
        $new_apartment->rooms = $requested_data['rooms'];
        $new_apartment->beds = $requested_data['beds'];
        $new_apartment->bathrooms = $requested_data['bathrooms'];
        $new_apartment->square = $requested_data['square'];
        $new_apartment->address = $requested_data['address'];
        $new_apartment->longitude = $requested_data['longitude'];
        $new_apartment->latitude = $requested_data['latitude'];
        $new_apartment->visible = true;

        if (isset($requested_data['image_path'])) {
            $path = $request->file('image_path')->store('images', 'public');
            $new_apartment->image_path = $path;
        }

        $new_apartment->save();

        if (isset($requested_data['facilities'])) {
            $new_apartment->facilities()->sync($requested_data['facilities']);
        }

        return redirect()->route('admin.apartments.show', $new_apartment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        $facilities = Facility::all();
        return view('admin.show', compact('apartment','facilities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $facilities = Facility::all();
        return view('admin.edit' , compact('apartment','facilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate($this->validationData());

        $requested_data = $request->all();

        if (isset($requested_data['image_path'])) {
            $path = $request->file('image_path')->store('images', 'public');
            $requested_data['image_path'] = $path;
        }

        $apartment->update($requested_data);

        if (isset($requested_data['facilities'])) {
            $apartment->facilities()->sync($requested_data['facilities']);
        } else {
            $apartment->facilities()->detach();
        }

        if ($apartment) {
          return redirect()->route('admin.apartments.show' , $apartment);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->messages()->delete();
        $apartment->stats()->delete();
        $apartment->facilities()->detach();
        $apartment->promos()->detach();
        $apartment->delete();

        return redirect()->route('admin.apartments.index');

    }

    public function validationData(){
      return [
        'title' => 'required|max:100',
        'rooms' => 'required|integer|min:1|max:9',
        'beds' => 'required|integer|min:1|max:9',
        'bathrooms' => 'required|integer|min:1|max:9',
        'square' => 'required|integer|min:50|max:300',
        'address' => 'required|max:255',
        'longitude' => 'required|numeric|min:-180|max:180',
        'latitude' => 'required|numeric|min:-90|max:90',
        'image_path' => 'image',
      ];
    }

}

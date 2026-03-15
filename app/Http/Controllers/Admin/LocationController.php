<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('location','allLocations');
        $locations = Location::latest()->paginate(15);
        $allLocations = Location::all();
        return view('admin.location.index', compact('locations', 'allLocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Not needed as the form is on the index page
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:bravo_locations,name',
            'parent_id' => 'nullable|exists:bravo_locations,id',
            'content' => 'nullable|string',
            'map_lat' => 'nullable|numeric',
            'map_lng' => 'nullable|numeric',
            'map_zoom' => 'nullable|integer',
        ]);

        $location = new Location();
        $location->name = $request->name;
        $location->slug = Str::slug($request->name);
        $location->parent_id = $request->parent_id;
        $location->content = $request->content;
        $location->map_lat = $request->map_lat;
        $location->map_lng = $request->map_lng;
        $location->map_zoom = $request->map_zoom;
        $location->status = 'publish'; // Default status
        $location->save();

        return back()->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        session(['lsbm' => 'location', 'lsbsm' => 'allLocations']);
        $location = Location::findOrFail($id);
        $allLocations = Location::where('id', '!=', $id)->get();
        return view('admin.location.edit', compact('location', 'allLocations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:bravo_locations,name,' . $id,
            'parent_id' => 'nullable|exists:bravo_locations,id',
            'content' => 'nullable|string',
            'map_lat' => 'nullable|numeric',
            'map_lng' => 'nullable|numeric',
            'map_zoom' => 'nullable|integer',
            'status' => 'required|string|in:publish,draft',
        ]);

        $location = Location::findOrFail($id);
        $location->name = $request->name;
        $location->slug = Str::slug($request->name);
        $location->parent_id = $request->parent_id;
        $location->content = $request->content;
        $location->map_lat = $request->map_lat;
        $location->map_lng = $request->map_lng;
        $location->map_zoom = $request->map_zoom;
        $location->status = $request->status;
        $location->save();

        return redirect()->route('admin.locations.index')->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return back()->with('success', 'Location deleted successfully.');
    }
}

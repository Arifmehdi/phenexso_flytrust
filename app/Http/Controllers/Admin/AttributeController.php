<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('hotel','allRoomAttributes');
        $attributes = Attributes::where('service', 'hotel')->latest()->paginate(15);
        return view('admin.attribute.index', compact('attributes'));
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
            'name' => 'required|string|max:255|unique:bravo_attrs,name,NULL,id,service,hotel', // Unique per service
        ]);

        $attribute = new Attributes();
        $attribute->name = $request->name;
        $attribute->slug = Str::slug($request->name);
        $attribute->service = 'hotel'; // Hardcode service for room attributes
        $attribute->hide_in_filter_search = 0;
        $attribute->position = 0;
        $attribute->hide_in_single = 0;
        $attribute->save();

        return back()->with('success', 'Attribute created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // This would show the terms for an attribute, which is a separate task.
        // For now, we can redirect or show a simple view.
        return redirect()->route('admin.attributes.index')->with('info', 'Manage terms for this attribute here.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = Attributes::where('service', 'hotel')->findOrFail($id);
        return view('admin.attribute.edit', compact('attribute'));
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
            'name' => 'required|string|max:255|unique:bravo_attrs,name,' . $id . ',id,service,hotel', // Unique per service
        ]);

        $attribute = Attributes::where('service', 'hotel')->findOrFail($id);
        $attribute->name = $request->name;
        $attribute->slug = Str::slug($request->name);
        $attribute->save();

        return redirect()->route('admin.attributes.index')->with('success', 'Attribute updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attributes::where('service', 'hotel')->findOrFail($id);
        $attribute->delete();

        return back()->with('success', 'Attribute deleted successfully.');
    }
}

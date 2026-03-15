<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LocationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('location','allLocationCategory');
        $categories = LocationCategory::latest()->paginate(15);
        return view('admin.location-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string|max:255|unique:location_category,name',
            'icon' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $category = new LocationCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->icon_class = $request->icon;
        $category->status = $request->input('status', 0); // Directly use the value from radio button, default to 0
        $category->save();

        return back()->with('success', 'Category created successfully.');
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
        session(['lsbm' => 'slider', 'lsbsm' => 'locationCategories']);
        $category = LocationCategory::findOrFail($id);
        return view('admin.location-category.edit', compact('category'));
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
            'name' => 'required|string|max:255|unique:location_category,name,' . $id,
            'icon' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $category = LocationCategory::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->icon_class = $request->icon;
        $category->status = $request->input('status', 0); // Directly use the value from radio button, default to 0
        $category->save();

        return redirect()->route('admin.location-categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = LocationCategory::findOrFail($id);
        $category->delete();

        return back()->with('success', 'Category deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource (for frontend)
     */
    public function index()
    {
        $properties = Property::where('is_available', true)->get();
        return view('rent', compact('properties'));
    }

    /**
     * Display admin panel with all properties
     */
    public function admin()
    {
        $properties = Property::all();
        return view('properties.admin', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|in:apartment,house,office,villa',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'size' => 'nullable|numeric',
            'location' => 'required|string|max:255',
            'city' => 'required|string|in:Karachi,Lahore,Islamabad',
            'price' => 'required|numeric',
            'price_type' => 'required|string|in:month,week,day',
            'image_url' => 'required|url',
        ]);

        Property::create($request->all());

        return redirect()->route('properties.admin')
            ->with('success', 'Property created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|in:apartment,house,office,villa',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'size' => 'nullable|numeric',
            'location' => 'required|string|max:255',
            'city' => 'required|string|in:Karachi,Lahore,Islamabad',
            'price' => 'required|numeric',
            'price_type' => 'required|string|in:month,week,day',
            'image_url' => 'required|url',
            'is_available' => 'boolean',
        ]);

        $property->update($request->all());

        return redirect()->route('properties.admin')
            ->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('properties.admin')
            ->with('success', 'Property deleted successfully.');
    }



    /**
 * Show the form for creating a property from frontend
 */
public function createFromFrontend()
{
    return view('sell'); // This should be your blade file name
}

/**
 * Store property from frontend form
 */
public function storeFromFrontend(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'type' => 'required|string|in:apartment,house,office,villa',
        'bedrooms' => 'nullable|integer',
        'bathrooms' => 'nullable|integer',
        'size' => 'nullable|numeric',
        'location' => 'required|string|max:255',
        'city' => 'required|string|in:Karachi,Lahore,Islamabad',
        'price' => 'required|numeric',
        'price_type' => 'required|string|in:month,week,day',
        'image_url' => 'required|url',
    ]);

    // Add default values for frontend submissions
    $data = $request->all();
    $data['is_available'] = true;
    
    Property::create($data);

    // Redirect back to the sell page with success message
    return redirect()->route('properties.sell')
        ->with('success', 'Your property has been listed successfully! It will appear on the homepage soon.');
}
}
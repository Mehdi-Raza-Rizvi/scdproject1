<?php

namespace App\Http\Controllers;

use App\Models\Broker;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    // Frontend - Display all brokers
    public function index()
    {
        $brokers = Broker::where('is_active', true)->get();
        return view('brokers', compact('brokers'));
    }

    // Admin - Display all brokers with CRUD options
    public function adminIndex()
    {
        $brokers = Broker::all();
        return view('brokers.admin', compact('brokers'));
    }

    // Show create form
    public function create()
    {
        return view('brokers.create');
    }

    // Store new broker
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:brokers,email',
            'phone' => 'required|string',
            'experience_years' => 'required|string',
            'specialization' => 'required|string',
            'city' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brokers', 'public');
        }

        Broker::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'experience_years' => $request->experience_years,
            'specialization' => $request->specialization,
            'city' => $request->city,
            'description' => $request->description,
            'image_url' => $imagePath ? asset('storage/' . $imagePath) : null,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('brokers.admin')->with('success', 'Broker added successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $broker = Broker::findOrFail($id);
        return view('brokers.edit', compact('broker'));
    }

    // Update broker
    public function update(Request $request, $id)
    {
        $broker = Broker::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:brokers,email,' . $id,
            'phone' => 'required|string',
            'experience_years' => 'required|string',
            'specialization' => 'required|string',
            'city' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $broker->image_url;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brokers', 'public');
            $imagePath = asset('storage/' . $imagePath);
        }

        $broker->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'experience_years' => $request->experience_years,
            'specialization' => $request->specialization,
            'city' => $request->city,
            'description' => $request->description,
            'image_url' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('brokers.admin')->with('success', 'Broker updated successfully!');
    }

    // Delete broker
    public function destroy($id)
    {
        $broker = Broker::findOrFail($id);
        $broker->delete();

        return redirect()->route('brokers.admin')->with('success', 'Broker deleted successfully!');
    }
}
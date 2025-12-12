<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class PropertyApiController extends Controller
{
    public function index()
    {
        try {
            return response()->json(Property::all(), 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to fetch properties', 'details' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $property = Property::findOrFail($id);
            return response()->json($property, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Property not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to fetch property', 'details' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $property = Property::create($request->all());
            return response()->json($property, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create property', 'details' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $property = Property::findOrFail($id);
            $property->update($request->all());
            return response()->json($property, 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Property not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update property', 'details' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = Property::destroy($id);

            if (!$deleted) {
                return response()->json(['error' => 'Property not found'], 404);
            }

            return response()->json(['message' => 'Property deleted'], 200);

        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete property', 'details' => $e->getMessage()], 500);
        }
    }

    public function search(Request $request)
    {
        try {
            $query = Property::query();

            if ($request->has('city')) {
                $query->where('city', 'LIKE', '%'.$request->city.'%');
            }

            if ($request->has('min_price')) {
                $query->where('price', '>=', $request->min_price);
            }

            if ($request->has('max_price')) {
                $query->where('price', '<=', $request->max_price);
            }

            return response()->json($query->get(), 200);

        } catch (Exception $e) {
            return response()->json(['error' => 'Search failed', 'details' => $e->getMessage()], 500);
        }
    }
}

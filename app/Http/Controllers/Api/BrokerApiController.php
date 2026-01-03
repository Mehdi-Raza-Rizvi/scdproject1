<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class BrokerApiController extends Controller
{
    public function index()
    {
        try {
            return response()->json(Broker::all(), 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch brokers',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $broker = Broker::findOrFail($id);
            return response()->json($broker, 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Broker not found'
            ], 404);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch broker',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $broker = Broker::create($request->all());
            return response()->json($broker, 201);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to create broker',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $broker = Broker::findOrFail($id);
            $broker->update($request->all());

            return response()->json($broker, 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Broker not found'
            ], 404);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to update broker',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = Broker::destroy($id);

            if (!$deleted) {
                return response()->json([
                    'error' => 'Broker not found'
                ], 404);
            }

            return response()->json(['message' => 'Broker deleted'], 200);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to delete broker',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sensores = Sensor::all();

        if (!$sensores) {
            return response()->json(['message' => 'sensores not found'], 404);
        }
    
        return response()->json($sensores, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        return Sensor::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sensor = Sensor::find($id);
        

        if (!$sensor) {
            return response()->json(['message' => 'sensor not found'], 404);
        }
    
        return response()->json($sensor, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sensor = Sensor::find($id);
        $sensor->update($request->all());
        return $sensor;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Sensor::destroy($id);
    }
}

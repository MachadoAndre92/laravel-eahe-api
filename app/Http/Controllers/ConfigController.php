<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Zona;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $config = Config::all();

        if (!$config) {
            return response()->json(['message' => 'config not found'], 404);
        }
    
        return response()->json($config, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'zona_id' => 'required',
                'Threshold_min' => 'required',
                'Threshold_max' => 'required',
                'Temperatura' => 'required'
            ]
        );

        $config = Config::create($request->all());

        if (!$config) {
            return response()->json(['message' => 'config not created'], 422);
        }
        return response()->json($config, 201);
        
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $config = Config::find($id);

        if (!$config) {
            return response()->json(['message' => 'config not found'], 404);
        }

        return response()->json($config, 200);
    }

    /**
     * Get Configs of a Zona.
     */
    public function showByZona(string $id)
    {
        $config = Config::where('zona_id', $id)->first();

        if (!$config) {
            return response()->json(['message' => 'config not found'], 404);
        }

        return response()->json($config, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $config = Config::find($id);
        $config->update($request->all());
        return $config;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Config::destroy($id);
    }
}

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
        $zonas = Config::all();

        if (!$zonas) {
            return response()->json(['message' => 'zonas not found'], 404);
        }
    
        return response()->json($zonas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Zona::create($request->all());
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

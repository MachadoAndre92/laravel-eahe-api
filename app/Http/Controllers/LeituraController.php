<?php

namespace App\Http\Controllers;

use App\Models\Leitura;
use Illuminate\Http\Request;

class LeituraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leituras = Leitura::with(['sensor','zona'])->get();

        if (!$leituras) {
            return response()->json(['message' => 'Leitura not found'], 404);
        }
    
        return response()->json($leituras, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'zona_id' => 'required',
            'sensor_id' => 'required',
            'temp' => 'required',
            'hum' => 'required'
        ]);

        $leituras = Leitura::create($request->all());

        if (!$leituras) {
            return response()->json(['message' => 'Leitura not created'], 422);
        }
    
        return response()->json($leituras, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $leitura = Leitura::with(['sensor','zona'])->find($id);
        

        if (!$leitura) {
            return response()->json(['message' => 'Leitura not found'], 404);
        }
    
        return response()->json($leitura, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show_by_sensor(string $sensor_id)
    {
        $leituras = Leitura::with(['sensor','zona'])->where('sensor_id', $sensor_id)->get();
        

        if (!$leituras) {
            return response()->json(['message' => 'Leitura not found'], 404);
        }
    
        return response()->json($leituras, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show_by_zona(string $zona_id)
    {
        $leituras = Leitura::with(['sensor','zona'])->where('zona_id', $zona_id)->latest()->first();
        

        if (!$leituras) {
            return response()->json(['message' => 'Leitura not found'], 404);
        }
    
        return response()->json($leituras, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Leitura::destroy($id);
    }
}

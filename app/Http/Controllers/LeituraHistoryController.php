<?php

namespace App\Http\Controllers;

use App\Models\LeituraHistory;
use Illuminate\Http\Request;

class LeituraHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leituras = LeituraHistory::with(['sensor','zona'])->latest()->take(20)->get();

        if ($leituras->isEmpty()) {
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

        $leituras = LeituraHistory::create($request->all());

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
        //
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
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $zonas = Zona::with(['config'])->get();

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
        $request->validate([
            'name' => 'required',
            'conduta_ar' => 'required',
        ]);

        return Zona::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $zona = Zona::find($id);
        

        if (!$zona) {
            return response()->json(['message' => 'zona not found'], 404);
        }
    
        return response()->json($zona, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $zona = Zona::find($id);
        $zona->update($request->all());
        return $zona;
    }

    /**
     * Update the ar resource in zona.
     */
    public function update_ar(Request $request, string $id)
    {
        $zona = Zona::find($id);
        $zona->update($request->all());

        if (!$zona) {
            return response()->json(['message' => 'zonas not found'], 404);
        }
    
        return response()->json($zona, 201);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Zona::destroy($id);
    }
}

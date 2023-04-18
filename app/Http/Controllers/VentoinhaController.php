<?php

namespace App\Http\Controllers;

use App\Models\Ventoinha;
use Illuminate\Http\Request;

class VentoinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vent = Ventoinha::all();

        if (!$vent) {
            return response()->json(['message' => 'ventoinha not found'], 404);
        }
    
        return response()->json($vent, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'velocidade' => 'required',
            'mode' => 'required'
        ]);

        return Ventoinha::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ventoinha = Ventoinha::find($id);
        

        if (!$ventoinha) {
            return response()->json(['message' => 'ventoinha not found'], 404);
        }
    
        return response()->json($ventoinha, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ventoinha = Ventoinha::find($id);
        $ventoinha->update($request->all());
        return $ventoinha;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Ventoinha::destroy($id);
    }
}

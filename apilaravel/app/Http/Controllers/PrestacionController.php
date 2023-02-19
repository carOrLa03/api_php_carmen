<?php

namespace App\Http\Controllers;

use App\Models\Prestacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrestacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestaciones = Prestacion::all();
        return response()->json($prestaciones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prestacion = new Prestacion();
        $prestacion->nombre = $request->nombre;
        $prestacion->cuantia = $request->cuantia;
        $prestacion->save();
        return response()->json([
            'status' => true,
            'message' => "Prestación registrada correctamente!",
            'data'=> $prestacion
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prestacion = Prestacion::find($id);
        if(!$prestacion){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra la prestación con ese código.'])],404);
        }
        return response()->json($prestacion);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestacion $prestacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        $prestacion = Prestacion::find($id);
        if(!$prestacion){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra la prestación con ese código.'])],404);
        }
        $prestacion->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Prestación modificada!",
            'data'=>$prestacion
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestacion = Prestacion::find($id);
        if(!$prestacion){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra la prestación con ese código.'])],404);
        }
        $prestacion->delete();
        return response()->json([
            'status' => true,
            'message' => "Prestación eliminada!",
        ], 200);

    }
}

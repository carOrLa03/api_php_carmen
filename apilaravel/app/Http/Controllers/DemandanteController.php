<?php

namespace App\Http\Controllers;

use App\Models\Demandante;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DemandanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandantes = Demandante::all();
        return response()->json($demandantes);
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
        $demandante = new Demandante();
        $demandante->nombre = $request->nombre;
        $demandante->email = $request->email;
        $demandante->edad = $request->edad;
        $demandante->save();
        return response()->json([
            'status' => true,
            'message' => "Demandante registrado correctamente!",
            'data'=> $demandante
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $demandante = Demandante::find($id)->prestaciones()->get();

        if(!$demandante){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra el demandante con ese código.'])],404);
        }
        return response()->json($demandante);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demandante $demandante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $id, Request $request)
    {
        $demandante = Demandante::find($id);
        if(!$demandante){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra el demandante con ese código.'])],404);
        }
        $demandante->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Demandante modificado!",
            'data'=> $demandante
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $demandante = Demandante::find($id);
        if(!$demandante){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra el demandante con ese código.'])],404);
        }
        $demandante->delete();
        return response()->json([
            'status' => true,
            'message' => "Demandante eliminado!",
        ], 200);
    }

    public function attach(Request $request){
        $id = $request->demandante_id;
        $demandante = Demandante::find($request->demandante_id);
        if(!$demandante){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra el demandante con ese código.'])],404);
        }
        $demandante->prestaciones()->attach($request->prestacion_id);
        return response()->json([
            'status' => true,
            'message' => "Registro en prestamos exitoso!",
        ], 200);

    }
    public function detach(Request $request){

        $demandante = Demandante::find($request->demandante_id);
        if(!$demandante){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra el demandante con ese código.'])],404);
        }
        $demandante->prestaciones()->detach($request->prestacion_id);
        return response()->json([
            'status' => true,
            'message' => "Registro en prestamos borrado correctamente!",
        ], 200);

    }
}

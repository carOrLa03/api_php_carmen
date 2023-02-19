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
    public function index(): Response
    {
        $demandantes = Demandante::all()->get();
        return $demandantes;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Demandante $demandante): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demandante $demandante): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demandante $demandante): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demandante $demandante): RedirectResponse
    {
        //
    }
}

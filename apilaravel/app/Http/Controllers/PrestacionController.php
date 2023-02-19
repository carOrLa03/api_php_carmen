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
    public function index(): Response
    {
        $prestaciones = Prestacion::all()->get();
        return view('welcome', ['prestaciones'=>$prestaciones]);
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
    public function show(Prestacion $prestacion): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestacion $prestacion): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestacion $prestacion): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestacion $prestacion): RedirectResponse
    {
        //
    }
}

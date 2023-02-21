<?php

namespace App\Http\Controllers;

use App\Models\Demandante;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

/**
 * @method assertEquals(string $body, string $string)
 */
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/demandantes');
        $data = json_decode($response->body());
        $responsePrestaciones = Http::get('http://127.0.0.1:8000/api/prestaciones');
        $dataPrestaciones = json_decode($responsePrestaciones->body());
        return view('welcome', ['datos'=>$data, 'datosPrestaciones'=>$dataPrestaciones]);
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

        Http::post('http://127.0.0.1:8000/api/demandante', [
            'nombre'=>$request->input('nombre'),
            'email'=>$request->input('email'),
            'edad'=>$request->input('edad')
        ]);

        return $this->index();
    }
    public function storeprestacion(Request $request)
    {
        Http::post('http://127.0.0.1:8000/api/prestaciones', [
            'nombre'=>$request->input('nombre'),
            'cuantia'=>$request->input('cuantia')
        ]);
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $res = Http::get('http://127.0.0.1:8000/api/demandante/'.$id);
        $demandante = json_decode($res->body());

        $response = Http::get('http://127.0.0.1:8000/api/demandantes');
        $data = json_decode($response->body());
        $responsePrestaciones = Http::get('http://127.0.0.1:8000/api/prestaciones');
        $dataPrestaciones = json_decode($responsePrestaciones->body());
        return view('welcome', ['datos'=>$data, 'datosPrestaciones'=>$dataPrestaciones,'demandante'=>$demandante]);
    }
    public function showprestacion($id)
    {
        $res = Http::get('http://127.0.0.1:8000/api/prestaciones/'.$id);
        $prestacion = json_decode($res->body());

        $response = Http::get('http://127.0.0.1:8000/api/demandantes');
        $data = json_decode($response->body());
        $responsePrestaciones = Http::get('http://127.0.0.1:8000/api/prestaciones');
        $dataPrestaciones = json_decode($responsePrestaciones->body());
        return view('welcome', ['datos'=>$data, 'datosPrestaciones'=>$dataPrestaciones,'prestacion'=>$prestacion]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->index();
    }
    public function updateprestacion(Request $request, string $id)
    {
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Http::delete('http://127.0.0.1:8000/api/demandante/'.$id);
        return $this->index();
    }
    public function destroyprestacion($id)
    {
        Http::delete('http://127.0.0.1:8000/api/prestaciones/'.$id);
        return $this->index();
    }
}

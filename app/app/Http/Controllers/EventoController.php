<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EventoController extends Controller
{

    // display all resources
    public function index()
    {

        // $eventos = Evento::all();
        // return response()->json($eventos);

        $response = Http::get('http://10.2.15.143:30150/events');
        return $response;


    }

    //store a newly created resource
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nome' => 'required|string',
            'tipo' => 'required|string',


        ]);

        $evento = Evento::create($validateData);

        return response()->json($evento,201);




    }

    //display the specified resource.

    public function show(Evento $evento)
    {

        return response()->json($evento);


    }

    //update
    public function update(Request $request,Evento $evento)
    {

        $validateData = $request->validate([
            'nome' => 'required|string',
            'tipo' => 'required|string',


        ]);

        $evento->update($validateData);

        return response()->json($evento,200);


    }

    //remove a resource.
    public function destroy(Evento $evento)
    {

        $evento->delete();

        return response()->json(null,204);


    }




}
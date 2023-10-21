<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();

        //return $clients to json response
        return response()->json($clients);
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
        //Se trabaja con el POST
        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();

        $data = [
            'message' => 'Client created successfully',
            'client' => $client
        ];

        //return $client to json response
        return response()->json($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //Se trabaja con el GET
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //Se trabaja con el PUT
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();

        $data = [
            'message' => 'Client updated successfully',
            'client' => $client
        ];

        //return $client to json response
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //Se trabaja con el DELETE
        $client->delete();

        $data = [
            'message' => 'Client deleted successfully',
            'client' => $client
        ];

        //return $client to json response
        return response()->json($data);
    }
}

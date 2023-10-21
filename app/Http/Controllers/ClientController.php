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

        $array = [];
        foreach ($clients as $client) {
            $array[] = [
                'id' => $client->id,
                'name' => $client->name,
                'email' => $client->email,
                'phone' => $client->phone,
                'address' => $client->address,
                'services' => $client->services
            ];
        }
        //return $clients to json response
        return response()->json($array);
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
        //hacer un with pivot para que muestre los servicios
        $client = Client::with('services')->find($client->id);

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

    public function attach(Request $request)
    {
        $client = Client::find($request->client_id);
        $client->services()->attach($request->service_id);

        $data = [
            'message' => 'Service attached successfully',
            'client' => $client
        ];

        //return $client to json response
        return response()->json($data);
    }

    //hacer lo mismo paara detach
    public function detach(Request $request)
    {
        $client = Client::find($request->client_id);
        $client->services()->detach($request->service_id);

        $data = [
            'message' => 'Service detached successfully',
            'client' => $client
        ];

        //return $client to json response
        return response()->json($data);
    }
}

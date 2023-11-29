<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit');
        $columna = $request->get('columna');
        $order = $request->get('order');
        $filter = strtoupper($request->get('filter'));
        $ff = $request->get('ff', $filter == '' ? '%%' : '%' . $filter . '%');

        $data = DB::table('clients')
            ->select('*')
            ->where($columna, 'like', $ff)
            ->orderBy($columna, $order)
            ->paginate($limit);

        return response()->json(['data' => $data], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json(['respuesta'=>'este es el create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nombre' => 'required|string|max:255',
        //     // 'pais' => 'required|string',
        //     // 'ciudad' => 'required|string',
        //     // 'direccion' => 'required|string'
        // ]);
        // $data = $request->all();
        // Client::create([
        //     'nombre' => $data['nombre'],
        //     'pais' => $data['pais'],
        //     'ciudad' => $data['ciudad'],
        //     'direccion' => $data['direccion'],
        //     'web' => $data['web'],
        //     'contacto' => $data['contacto'],
        //     'telefono' => $data['telefono'],
        //     'celular' => $data['celular'],
        //     'email' => $data['email'],
        //     'nit' => $data['nit']
        // ]);
        $model = new Client(); // Replace "Model" with the actual name of your model
        $model->fill($request->all()); // Fill the model with data from the request
        $model->save(); // Save the model to the database
    

        $mensaje = "Registrado correctamente";
        return response()->json(['mensaje'=>$mensaje, 'data'=>$model], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return response()->json(['respuesta'=>'este es el show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return response()->json(['respuesta'=>'este es el edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        return response()->json(['respuesta'=>'este es el update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        return response()->json(['respuesta'=>'este es el destroy']);
    }
}

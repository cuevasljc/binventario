<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
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

        $data = DB::table('users')
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new User(); // Replace "Model" with the actual name of your model
        $model->fill($request->all()); // Fill the model with data from the request
        $model->save(); // Save the model to the database
    
        $mensaje = "Registrado correctamente";
        return response()->json(['mensaje'=>$mensaje, 'data'=>$model], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

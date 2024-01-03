<?php

namespace App\Http\Controllers;

use App\Models\Recursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RecursosController extends Controller
{
    public function itemone(Request $request)
    {
        $codigo = $request->get('codigo');
        // $sistema = $request->get('sistema');
        $data = DB::table('items')
        ->join('sucursalstocks','items.id','=','sucursalstocks.item_id')
        ->where('items.codigo',$codigo)
        ->first();
       return response()->json($data, 200); 
    }
    public function clientone(Request $request)
    {
        $nit = $request->get('nit');
        // $sistema = $request->get('sistema');
        $data = DB::table('clients')
        ->where('nit',$nit)
        ->first();
       return response()->json($data, 200); 
    }
}

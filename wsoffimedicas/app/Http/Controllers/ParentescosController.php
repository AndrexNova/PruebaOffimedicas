<?php

namespace App\Http\Controllers;

use App\Parentescos;
use Illuminate\Http\Request;

class ParentescosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $response = [];
                
            $parentescos = Parentescos::all();
            $response['data'] = $parentescos;
            $response['code'] = "200";
            $response['msg'] = "Parentescos Listados Con Exito";
            return $response;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $usuario = Parentescos::create($request->all());
        $response['data'] = $usuario;
        $response['msg'] = "Parentesco Creado Con Exito";
        $response['code'] = "200";

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parentescos  $parentescos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = [];
            
        $response['data'] = Parentescos::find($id);
        $response['msg'] = "Parentesco Listado Con Exito";
        $response['code'] = "200";

        return $response;

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parentescos  $parentescos
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $response = [];

        $parentesco = Parentescos::findOrFail($id);
        $parentesco->update($request->all());
        $response['data'] = $parentesco;
        $response['msg'] = "Parentesco Actualizado Con Exito";
        $response['code'] = "200";

        return $response;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parentescos  $parentescos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $response = [];

        $parentesco = Parentescos::findOrFail($id);
        $parentesco->delete();
        $response['code'] = "200";
        $response['data'] = [];
        $response['msg'] = "Eliminado Exitosamente";

        return $response;
    }
}

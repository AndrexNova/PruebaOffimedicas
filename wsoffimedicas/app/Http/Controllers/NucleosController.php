<?php

namespace App\Http\Controllers;

use App\Nucleos;
use Illuminate\Http\Request;
use App\Usuarios;

class NucleosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $response = [];
                
        $nucleos = Nucleos::all();
        $response['data'] = $nucleos;
        $response['code'] = "200";
        $response['msg'] = "Núcleos Listados Con Exito";
        return $response;
    }


    public function store(Request $request)
    {

        $idusuarioppal = $request->input('idusuarioppal');
        $idusuarionucleo = $request->input('idusuarionucleo');

        $usuarioNucleo =  Usuarios::find($idusuarionucleo);
        
        if(  sha1(md5($usuarioNucleo->email)) != $usuarioNucleo->password ){
            $response['data'] = [];
            $response['msg'] = "No se puede añadir esta persona al núcleo familiar por que tiene usuario creado";
            $response['code'] = "201";
        } else if($idusuarioppal != $idusuarionucleo){
            $nucleo = Nucleos::create($request->all());
            $response['data'] = $nucleo;
            $response['msg'] = "Núcleo Creado Con Exito";
            $response['code'] = "200";
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nucleos  $nucleos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = [];
            
        $response['data'] = Nucleos::find($id);
        $response['msg'] = "Núcleo Listado Con Exito";
        $response['code'] = "200";

        return $response;

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nucleos  $nucleos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $response = [];

        $nucleo = Nucleos::findOrFail($id);
        $nucleo->update($request->all());
        $response['data'] = $nucleo;
        $response['msg'] = "Núcleo Actualizado Con Exito";
        $response['code'] = "200";

        return $response;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nucleos  $nucleos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $response = [];

        $nucleo = Nucleos::findOrFail($id);

        $usuarioNucleo =  Usuarios::find($nucleo->idusuarionucleo);

        \Log::debug($usuarioNucleo);

        if(!isset($usuarioNucleo->email )){
            $response['code'] = "201";
            $response['data'] = [];
            $response['msg'] = "Núcleo no existe";
        }else if( sha1(md5($usuarioNucleo->email)) == $usuarioNucleo->password ){
            $nucleo->delete();
            $response['code'] = "200";
            $response['data'] = [];
            $response['msg'] = "Eliminado Exitosamente";
        }else{
            $response['code'] = "201";
            $response['data'] = [];
            $response['msg'] = "No puede ser eliminado del núcleo";
        }
        return $response;
    }
}

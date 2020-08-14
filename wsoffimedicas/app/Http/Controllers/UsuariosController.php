<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [];
            
        $usuarios = Usuarios::all();
        $response['data'] = $usuarios;
        $response['msg'] = "Usuarios Listados Con Exito";
        $response['code'] = "200";

        return $response;
    }

    public function store(Request $request)
    {


        $email = $request->input('email');
        $usuario = Usuarios::where('email',$email )->first();
        $response = [];

        if(is_null($usuario)){

            $usuario = Usuarios::create([
                'name' => $request->input('name'),
                'email' =>$request->input('email'),
                'password' => sha1(md5($request->input('password'))),
            ]);
            $response['code'] = "200";

            //$usuario = Usuarios::create($request->all());
            $response['data'] = $usuario;
            $response['msg'] = "Usuario Creado Con Exito";
        }else{

            $response['data'] =  $usuario ;
            $response['msg'] = "Usuario Ya Existe";
            $response['code'] = "201";

            if(sha1(md5($usuario->email)) == $usuario->password){
                $usuario->update([
                    'name' => $request->input('name'),
                    'email' =>$request->input('email'),
                    'password' => sha1(md5($request->input('password'))),
                ]);
                $response['data'] = $usuario;
                $response['msg'] = "Usuario Creado Con Exito";
                $response['code'] = "200";
            }

    

        }

        return $response;
    }

    public function show($id)
    {
        $response = [];
            
        $response['data'] = Usuarios::find($id);
        $response['msg'] = "Usuario Listado Con Exito";
        $response['code'] = "200";

        return $response;

    }

    public function update(Request $request, $id)
    {

        $email = $request->input('email');
        $usuario = Usuarios::where('email',$email )->first();
        $response = [];

        if(is_null($usuario)){
            $usuario = Usuarios::findOrFail($id);
            $usuario->update($request->all());
            $response['data'] = $usuario;
            $response['msg'] = "Usuario Actualizado Con Exito";
        }else{
            $usuario = $usuario;
            $response['data'] = [];
            $response['msg'] = "Email Ya Existe";
        }
        $response['code'] = "200";

        return $response;
    }

    public function destroy(Request $request, $id)
    {
        $response = [];

        $usuarios = Usuarios::findOrFail($id);
        $usuarios->delete();

        $response['data'] = [];
        $response['msg'] = "Eliminado Exitosamente";
        $response['code'] = "200";

        return $response;
    }
    
    public function getLogin(Request $request)
    {
        $response = []; 

        
        $email = $request->input('email');
        $password = $request->input('password');

        $usuario = Usuarios::where([
            ['email',$email],
            ['password',sha1(md5($password))]
        ])->first();

        $response['data'] = $usuario;

        if(is_null($usuario)){
            $response['msg'] = "Por favor revisar usuario y contraseña";
            $response['code'] = "201";
        }else if(isset($usuario->email) && sha1(md5($usuario->email)) == $usuario->password){
            $response['msg'] = "Debe registrarse para ingresar";
            $response['code'] = "201";

        }else{
            $response['msg'] = "Usuario Logueando";
            $response['code'] = "200";
        }

        return $response;
    }


    public function getNucleo($id){
        $usuariosNucleos = \DB::table('usuarios')
        ->join('nucleos', 'usuarios.id', '=', 'nucleos.idusuarionucleo')
        ->join('parentescos', 'parentescos.id', '=', 'nucleos.idparentesco')
        ->where('nucleos.idusuarioppal', $id)
        ->select(['usuarios.name as nombreusuario',
                  'parentescos.name as parentesconombre', 
                  'usuarios.email as email',
                  'nucleos.id as idnucleo'
                  ] )
        ->get();

        $response = [];
            
        $response['data'] = $usuariosNucleos;
        $response['msg']  = "Usuario Listado Con Exito";
        $response['code'] = "200";
        
        return $response;
    }

    public function getUsuarioNucleo($idusuarioppal,$idusuarionucleo){
        
        $usuariosNucleos = \DB::table('usuarios')
        ->join('nucleos', 'usuarios.id', '=', 'nucleos.idusuarionucleo')
        ->join('parentescos', 'parentescos.id', '=', 'nucleos.idparentesco')
        ->where('nucleos.idusuarioppal', $idusuarioppal)
        ->where('nucleos.idusuarionucleo', $idusuarionucleo)
        ->select(\DB::raw('COUNT(1) as cantidad'))
        ->get();
        $response = [];
        $response['data'] = $usuariosNucleos;
        $response['msg']  = "Usuario Listado Con Exito";
        $response['code'] = "200";
        
        return $response;
    }

    public function showWithEmail($email)
    {
        $response = [];
            
        $usuario = Usuarios::where([['email',$email]])->first();

        $response['data'] = $usuario;
        $response['msg'] = "Usuario Listado Con Exito";
        $response['code'] = "200";

        return $response;

    }


}

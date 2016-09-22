<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permiso;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Input;
use Redirect;
use Response;

class PermisoController extends Controller
{
    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
        $this->beforeFilter('@find');
    }

    public function find(Route $route){
        $this->permiso = Permiso::find($route->getParameter('permisos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permiso::All();
        return view('permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permisos.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax())
        {
            if($request['suplente'] == "on")
                $suplente = 1;
            else if($request['suplente'] != "on")
                $suplente = 0;
            if($request['aprobacion'] == "on")
                $aprobacion = 1;
            else if($request['aprobacion'] != "on")
                $aprobacion = 0;
            $campos = [
                'cedula'            => $request['cedula'], 
                'nombre'            => $request['nombre'], 
                'cargo'             => $request['cargo'],
                'tipo_personal'     => $request['tipo_personal'],
                'adscrito'          => $request['adscrito'],
                'tipo_permiso'      => $request['tipo_permiso'],
                'duracion'          => $request['duracion'],
                'fecha_requerida'   => $request['fecha_requerida_submit'],
                'suplente'          => $suplente,
                'aprobacion'        => $aprobacion
            ];
            Permiso::create($campos);
            return response()->json([
                'nuevoContenido' => $request->all()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('permisos.show', ['permiso' => $this->permiso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('permisos.edit', ['permiso' => $this->permiso]);
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
        if($request->ajax())
        {
            if($request['suplente'] == "on")
                $suplente = 1;
            else if($request['suplente'] != "on")
                $suplente = 0;
            if($request['aprobacion'] == "on")
                $aprobacion = 1;
            else if($request['aprobacion'] != "on")
                $aprobacion = 0;
            $campos = [
                'cedula'            => $request['cedula'], 
                'nombre'            => $request['nombre'], 
                'cargo'             => $request['cargo'],
                'tipo_personal'     => $request['tipo_personal'],
                'adscrito'          => $request['adscrito'],
                'tipo_permiso'      => $request['tipo_permiso'],
                'duracion'          => $request['duracion'],
                'fecha_requerida'   => $request['fecha_requerida_submit'],
                'suplente'          => $suplente,
                'aprobacion'        => $aprobacion
            ];
            $this->permiso->fill($campos);
            $this->permiso->save();
            return response()->json([
                'nuevoContenido' => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null ($this->permiso))
            \App::abort(404);

        $this->permiso->delete();

        if (\Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Permiso de "' . $this->permiso->nombre . '" eliminado satisfactoriamente',
                'id'      => $this->permiso->id
            ));
        }
        else
        {
            $mensaje = 'Permiso de "'.$this->permiso->nombre.'" eliminado satisfactoriamente';
            Session::flash('message-alert', $mensaje);
            return Redirect::route('permisos.index');
        }
    }
}

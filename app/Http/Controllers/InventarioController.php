<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Departamento;
use App\Inventario;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Input;
use Redirect;
use Response;

class InventarioController extends Controller
{
    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
        $this->beforeFilter('@find');
    }

    public function find(Route $route){
        $this->inventario = Inventario::find($route->getParameter('inventarios'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::All();
        return view('inventarios.index', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = array('' => "Seleccione") + \DB::table('departamentos')->orderBy('nombre', 'asc')->lists('nombre','id');
        return view('inventarios.new', compact('departamentos'));
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
            $campos = [
                'producto'      => $request['producto'], 
                'modelo'        => $request['modelo'], 
                'marca'         => $request['marca'], 
                'cantidad'      => $request['cantidad'], 
                'serial'        => $request['serial'], 
                'observaciones' => $request['observaciones'], 
                'departamento'  => $request['departamento']
            ];
            Inventario::create($campos);
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
        return view('inventarios.show', ['inventario' => $this->inventario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamentos = array('' => "Seleccione") + \DB::table('departamentos')->orderBy('nombre', 'asc')->lists('nombre','id');
        return view('inventarios.edit', ['inventario' => $this->inventario, 'departamentos' => $departamentos]);
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
            $campos = [
                'producto'      => $request['producto'], 
                'modelo'        => $request['modelo'], 
                'marca'         => $request['marca'], 
                'cantidad'      => $request['cantidad'], 
                'serial'        => $request['serial'], 
                'observaciones' => $request['observaciones'], 
                'departamento'  => $request['departamento']
            ];
            $this->inventario->fill($campos);
            $this->inventario->save();
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
        if (is_null ($this->inventario))
            \App::abort(404);

        $this->inventario->delete();

        if (\Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Producto "'. $this->inventario->producto . '" serial "'.$this->inventario->serial.'" eliminado satisfactoriamente',
                'id'      => $this->inventario->id
            ));
        }
        else
        {
            $mensaje = 'Producto "'. $this->inventario->producto . '" serial "'.$this->inventario->serial.'" eliminado satisfactoriamente';
            Session::flash('message-alert', $mensaje);
            return Redirect::route('inventarios.index');
        }
    }
}

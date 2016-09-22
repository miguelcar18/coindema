<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Departamento;
use App\Vehiculo;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Input;
use Redirect;
use Response;

class VehiculoController extends Controller
{
    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
        $this->beforeFilter('@find');
    }

    public function find(Route $route){
        $this->vehiculo = Vehiculo::find($route->getParameter('vehiculos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::All();
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = array('' => "Seleccione") + \DB::table('departamentos')->orderBy('nombre', 'asc')->lists('nombre','id');
        return view('vehiculos.new', compact('departamentos'));
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
                'unidad'        => $request['unidad'], 
                'marca'         => $request['marca'], 
                'modelo'        => $request['modelo'], 
                'placa'         => $request['placa'], 
                'serial'        => $request['serial'], 
                'carroceria'    => $request['carroceria'], 
                'serial_motor'  => $request['serial_motor'], 
                'color'         => $request['color'], 
                'departamento'  => $request['departamento'], 
                'estado'        => $request['estado']
            ];
            Vehiculo::create($campos);
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
        return view('vehiculos.show', ['vehiculo' => $this->vehiculo]);
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
        return view('vehiculos.edit', ['vehiculo' => $this->vehiculo, 'departamentos' => $departamentos]);
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
                'unidad'        => $request['unidad'], 
                'marca'         => $request['marca'], 
                'modelo'        => $request['modelo'], 
                'placa'         => $request['placa'], 
                'serial'        => $request['serial'], 
                'carroceria'    => $request['carroceria'], 
                'serial_motor'  => $request['serial_motor'], 
                'color'         => $request['color'], 
                'departamento'  => $request['departamento'], 
                'estado'        => $request['estado']
            ];
            $this->vehiculo->fill($campos);
            $this->vehiculo->save();
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
        if (is_null ($this->vehiculo))
            \App::abort(404);

        $this->vehiculo->delete();

        if (\Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Vehiculo de placa "' . $this->vehiculo->placa . '" eliminado satisfactoriamente',
                'id'      => $this->vehiculo->id
            ));
        }
        else
        {
            $mensaje = 'Vehiculo de placa "'.$this->vehiculo->placa.'" eliminado satisfactoriamente';
            Session::flash('message-alert', $mensaje);
            return Redirect::route('vehiculos.index');
        }
    }
}
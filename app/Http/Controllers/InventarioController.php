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

    public function consulta()
    {
        $departamentos = array('' => "Seleccione") + \DB::table('departamentos')->orderBy('nombre', 'asc')->lists('nombre','id');
        return view('inventarios.consulta', compact('departamentos'));
    }

    public function resultados(Request $request)
    {
        $producto       = $request['producto']; 
        $modelo         = $request['modelo']; 
        $marca          = $request['marca']; 
        $cantidad       = $request['cantidad']; 
        $serial         = $request['serial']; 
        $departamento   = $request['departamento'];

        if($producto == "" && $modelo == "" && $marca == "" && $cantidad == "" && $serial == "" && $departamento == "")
        {
            $inventarios = Inventario::All();
        }
        else
        {
            $inventarios = Inventario::with(array('nombreDepartamento'));
            $nombreDep = "";

            if($producto != "")
            {
                $inventarios = $inventarios->where('producto', $producto);
            }
            if($modelo != "")
            {
                $inventarios = $inventarios->where('modelo', 'like', '%'. $modelo.'%');
            }
            if($marca != "")
            {
                $inventarios = $inventarios->where('marca', 'like', '%'. $marca.'%');
            }
            if($cantidad != "")
            {
                $inventarios = $inventarios->where('cantidad', 'like', '%'. $cantidad.'%');
            }
            if($serial != "")
            {
                $inventarios = $inventarios->where('serial', 'like', '%'. $serial.'%');
            }
            if($departamento != "")
            {
                $inventarios = $inventarios->where('departamento', $departamento);
                $buscarNombreDep = Departamento::find($departamento);
                $nombreDep = $buscarNombreDep->nombre;
            }
            $inventarios = $inventarios->get();
        }
        return view('inventarios.resultados', compact('inventarios', 'producto', 'modelo', 'marca', 'cantidad', 'serial', 'departamento', 'nombreDep'));
    }

    public function pdfResultados(Request $request)
    {
        $producto       = $request['producto']; 
        $modelo         = $request['modelo']; 
        $marca          = $request['marca']; 
        $cantidad       = $request['cantidad']; 
        $serial         = $request['serial']; 
        $departamento   = $request['departamento'];

        if($producto == "" && $modelo == "" && $marca == "" && $cantidad == "" && $serial == "" && $departamento == "")
        {
            $inventarios = Inventario::All();
        }
        else
        {
            $inventarios = Inventario::with(array('nombreDepartamento'));
            $nombreDep = "";

            if($producto != "")
            {
                $inventarios = $inventarios->where('producto', $producto);
            }
            if($modelo != "")
            {
                $inventarios = $inventarios->where('modelo', 'like', '%'.$modelo.'%');
            }
            if($marca != "")
            {
                $inventarios = $inventarios->where('marca', 'like', '%'.$marca.'%');
            }
            if($cantidad != "")
            {
                $inventarios = $inventarios->where('cantidad', 'like', '%'.$cantidad.'%');
            }
            if($serial != "")
            {
                $inventarios = $inventarios->where('serial', 'like', '%'.$serial.'%');
            }
            if($departamento != "")
            {
                $inventarios = $inventarios->where('departamento', $departamento);
                $buscarNombreDep = Departamento::find($departamento);
                $nombreDep = $buscarNombreDep->nombre;
            }
            $inventarios = $inventarios->get();
        }
        $view =  \View::make('pdf.resultadoInventario', compact('inventarios', 'producto', 'modelo', 'marca', 'cantidad', 'serial', 'departamento', 'nombreDep'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
    }
}

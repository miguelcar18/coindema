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
                'desde'             => $request['desde_submit'],
                'hasta'             => $request['hasta_submit'],
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
                'desde'             => $request['desde_submit'],
                'hasta'             => $request['hasta_submit'],
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

    public function reportePermiso($id) 
    {
        $permiso = Permiso::find($id);
        $view =  \View::make('pdf.permiso', compact('permiso'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
    }

    public function consulta()
    {
        return view('permisos.consulta');
    }

    public function resultados(Request $request)
    {
        $tipo_permiso   = $request['tipo_permiso'];
        $desde          = $request['desde'];
        $desdeSql       = $request['desde_submit'];
        $hasta          = $request['hasta'];
        $hastaSql       = $request['hasta_submit'];
        $suplente       = $request['suplente'];
        $aprobacion     = $request['aprobacion'];

        if($tipo_permiso == "" && $desde == "" && $hasta == "" && $suplente == "" && $aprobacion == "")
        {
            $permisos = Permiso::All();
        }
        else
        {
            $permisos = Permiso::with(array());

            if($tipo_permiso != "")
            {
                $permisos = $permisos->where('tipo_permiso', $tipo_permiso);
            }
            if($suplente != "")
            {
                $permisos = $permisos->where('suplente', $suplente);
            }
            if($aprobacion != "")
            {
                $permisos = $permisos->where('aprobacion', $aprobacion);
            }
            if($request['desde'] != "")
            {
                $permisos = $permisos->where('desde', '>=',$request['desde_submit']);
            }
            if($request['hasta'] != "")
            {
                $permisos = $permisos->where('hasta', '<=', $request['hasta_submit']);
            }
            $permisos = $permisos->get();
        }
        return view('permisos.resultados', compact('permisos', 'tipo_permiso', 'desdeSql', 'hastaSql', 'suplente', 'aprobacion'));
    }

    public function pdfResultados(Request $request)
    {
        $tipo_permiso   = $request['tipo_permiso'];
        $desde          = $request['desde'];
        $hasta          = $request['hasta'];
        $suplente       = $request['suplente'];
        $aprobacion     = $request['aprobacion'];

        if($tipo_permiso == "" && $desde == "" && $hasta == "" && $suplente == "" && $aprobacion == "")
        {
            $permisos = Permiso::All();
        }
        else
        {
            $permisos = Permiso::with(array());

            if($tipo_permiso != "")
            {
                $permisos = $permisos->where('tipo_permiso', $tipo_permiso);
            }
            if($suplente != "")
            {
                $permisos = $permisos->where('suplente', $suplente);
            }
            if($aprobacion != "")
            {
                $permisos = $permisos->where('aprobacion', $aprobacion);
            }
            if($request['desde'] != "")
            {
                $permisos = $permisos->where('desde', '>=',$request['desde']);
            }
            if($request['hasta'] != "")
            {
                $permisos = $permisos->where('hasta', '<=', $request['hasta']);
            }
            $permisos = $permisos->get();
        }
        $view =  \View::make('pdf.resultadoPermiso', compact('permisos', 'tipo_permiso', 'desde', 'hasta', 'suplente', 'aprobacion'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
    }

}

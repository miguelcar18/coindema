<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comunicacion;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Input;
use Redirect;
use Response;

class ComunicacionController extends Controller
{
    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
        $this->beforeFilter('@find');
    }

    public function find(Route $route){
        $this->comunicacion = Comunicacion::find($route->getParameter('comunicaciones'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunicaciones = Comunicacion::All();
        return view('comunicaciones.index', compact('comunicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comunicaciones.new');
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
                'orden'         => $request['orden'], 
                'fecha'         => $request['fecha_submit'], 
                'numero_oficio' => $request['numero_oficio'],
                'de'            => $request['de'],
                'para'          => $request['para'],
                'asunto'        => $request['asunto']
            ];
            Comunicacion::create($campos);
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
        return view('comunicaciones.show', ['comunicacion' => $this->comunicacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('comunicaciones.edit', ['comunicacion' => $this->comunicacion]);
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
                'orden'         => $request['orden'], 
                'fecha'         => $request['fecha_submit'], 
                'numero_oficio' => $request['numero_oficio'],
                'de'            => $request['de'],
                'para'          => $request['para'],
                'asunto'        => $request['asunto']
            ];
            $this->comunicacion->fill($campos);
            $this->comunicacion->save();
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
        if (is_null ($this->comunicacion))
            \App::abort(404);

        $this->comunicacion->delete();

        if (\Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Comunicación "' . $this->comunicacion->numero_oficio . '" eliminada satisfactoriamente',
                'id'      => $this->comunicacion->id
            ));
        }
        else
        {
            $mensaje = 'Comunicación "'.$this->comunicacion->numero_oficio.'" eliminada satisfactoriamente';
            Session::flash('message-alert', $mensaje);
            return Redirect::route('comunicaciones.index');
        }
    }

    public function consulta()
    {
        return view('comunicaciones.consulta');
    }

    public function resultados(Request $request)
    {
        $orden          = $request['orden']; 
        $fecha          = $request['fecha_submit']; 
        $numero_oficio  = $request['numero_oficio'];
        $de             = $request['de'];
        $para           = $request['para'];
        $asunto         = $request['asunto'];

        if($orden == "" && $fecha == "" && $numero_oficio == "" && $de == "" && $para == "" && $asunto == "")
        {
            $comunicaciones = Comunicacion::All();
        }
        else
        {
            $comunicaciones = Comunicacion::with(array());

            if($orden != "")
            {
                $comunicaciones = $comunicaciones->where('orden', $orden);
            }
            if($fecha != "")
            {
                $comunicaciones = $comunicaciones->where('fecha', 'like', '%'. $fecha.'%');
            }
            if($numero_oficio != "")
            {
                $comunicaciones = $comunicaciones->where('numero_oficio', 'like', '%'. $numero_oficio.'%');
            }
            if($de != "")
            {
                $comunicaciones = $comunicaciones->where('de', 'like', '%'. $de.'%');
            }
            if($para != "")
            {
                $comunicaciones = $comunicaciones->where('para', 'like', '%'. $para.'%');
            }
            if($asunto != "")
            {
                $comunicaciones = $comunicaciones->where('asunto', 'like', '%'. $asunto.'%');
            }
            $comunicaciones = $comunicaciones->get();
        }
        return view('comunicaciones.resultados', compact('comunicaciones', 'orden', 'fecha', 'numero_oficio', 'de', 'para', 'asunto'));
    }

    public function pdfResultados(Request $request)
    {
        $orden          = $request['orden']; 
        $fecha          = $request['fecha_submit']; 
        $numero_oficio  = $request['numero_oficio'];
        $de             = $request['de'];
        $para           = $request['para'];
        $asunto         = $request['asunto'];

        if($orden == "" && $fecha == "" && $numero_oficio == "" && $de == "" && $para == "" && $asunto == "")
        {
            $comunicaciones = Comunicacion::All();
        }
        else
        {
            $comunicaciones = Comunicacion::with(array());

            if($orden != "")
            {
                $comunicaciones = $comunicaciones->where('orden', $orden);
            }
            if($fecha != "")
            {
                $comunicaciones = $comunicaciones->where('fecha', 'like', '%'. $fecha.'%');
            }
            if($numero_oficio != "")
            {
                $comunicaciones = $comunicaciones->where('numero_oficio', 'like', '%'. $numero_oficio.'%');
            }
            if($de != "")
            {
                $comunicaciones = $comunicaciones->where('de', 'like', '%'. $de.'%');
            }
            if($para != "")
            {
                $comunicaciones = $comunicaciones->where('para', 'like', '%'. $para.'%');
            }
            if($asunto != "")
            {
                $comunicaciones = $comunicaciones->where('asunto', 'like', '%'. $asunto.'%');
            }
            $comunicaciones = $comunicaciones->get();
        }
        $view =  \View::make('pdf.resultadoComunicacion', compact('comunicaciones', 'orden', 'fecha', 'numero_oficio', 'de', 'para', 'asunto'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
    }
}

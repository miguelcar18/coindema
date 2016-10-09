<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comunicacion;
use App\Departamento;
use App\Inventario;
use App\Permiso;
use App\User;
use App\Vehiculo;

class BackController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
    	$cantidadComunicacion 	= Comunicacion::count();
    	$cantidadDepartamento 	= Departamento::count();
    	$cantidadEquipo 		= Inventario::where('producto', 'equipos')->count();
    	$cantidadHerramienta 	= Inventario::where('producto', 'herramientas')->count();
    	$cantidadMaquinaria 	= Inventario::where('producto', 'maquinarias')->count();
    	$cantidadMaterial 		= Inventario::where('producto', 'materiales')->count();
    	$cantidadPermiso 		= Permiso::count();
    	$cantidadUsuario 		= User::count();
    	$cantidadVehiculo 		= Vehiculo::count();

    	return view('layouts.base', compact('cantidadComunicacion', 'cantidadDepartamento', 'cantidadEquipo', 'cantidadHerramienta', 'cantidadMaquinaria', 'cantidadMaterial', 'cantidadPermiso', 'cantidadUsuario', 'cantidadVehiculo'));
    }
}
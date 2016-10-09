@extends('layouts.base')

@section('titulo') Consulta de vehículos @stop

@section('cabecera-contenido')
    <!-- Page header -->
    <div class="page-header">
        <!-- Header content -->
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Vehículos</span> - Consultar vehículos</h4>
                <ul class="breadcrumb position-right">
                    <li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
                    <li><a href="{{ URL::route('vehiculos.index') }}">Vehículos</a></li>
                    <li class="active">Consultar vehículos</li>
                </ul>
            </div>
        </div>
        <!-- /header content -->
    </div>
    <!-- /page header -->
@stop
@section('contenido')
    <!-- User profile -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Profile info -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Consultar registro de vehículos</h6>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'vehiculos.resultados', 'method' => 'POST', 'class' => 'form-validate-general', 'id' => 'vehiculoConsultaForm']) !!}
                        @include('vehiculos.form.vehiculosConsultaForm')
                        <div class="text-right">
                            {!! Form::button('<i class="icon-search4 position-right"></i> Buscar', ['type' => 'submit', 'class' => 'btn btn-primary', 'data' => '1', 'id' => 'submit']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /profile info -->
        </div>
    </div>
    <!-- /user profile -->
@stop
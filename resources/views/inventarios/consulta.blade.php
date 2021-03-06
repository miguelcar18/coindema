@extends('layouts.base')

@section('titulo') Consulta de inventario @stop

@section('cabecera-contenido')
    <!-- Page header -->
    <div class="page-header">
        <!-- Header content -->
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Inventario</span> - Consultar registros</h4>
                <ul class="breadcrumb position-right">
                    <li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
                    <li><a href="{{ URL::route('inventarios.index') }}">Inventario</a></li>
                    <li class="active">Consultar registros</li>
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
                    <h6 class="panel-title">Consultar registro de inventario</h6>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'inventarios.resultados', 'method' => 'POST', 'class' => 'form-validate-general', 'id' => 'inventarioConsultaForm']) !!}
                        @include('inventarios.form.inventarioConsultaForm')
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
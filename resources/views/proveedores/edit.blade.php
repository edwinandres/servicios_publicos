@extends('layouts/plantilla')

@section('cabecera')
EDITAR REGISTROS
@endsection


@section('contenido')<!--FORMULARIO DE EDICION DE REGISTROS-->

<form action="/proveedores/{{ $proveedoresTable->id }}" method="POST">

        @if(count($errors)>0)
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table >

            <tr>
                <td>Creado en:</td>
            <td>{{$proveedoresTable->created_at->diffForHumans()}}</td>
            </tr>


            <tr>

                <td>Id: </td>
                <td>
                    <input type="text" name="id" value="{{$proveedoresTable->id}}" disabled>
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    <input type="hidden" name="_method" value="PATCH">
                </td>
            </tr>
            <tr>
                <td>Nombre: </td>
                <td>
                <input type="text" name="nombre" value="{{ old('nombre', $proveedoresTable->nombre) }} ">
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
                </td>
            </tr>
            <tr>
                <td>Descripcion: </td>
                <td>
                    <input type="text" name="descripcion" value="{{ old('descripcion', $proveedoresTable->descripcion)}}">
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    {!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>') !!}
                </td>
            </tr>


            <tr>
                <td colspan="" align="center">
                    <input type="submit" name="enviar" value="Actualizar">
                </td>
                <td>
                    <input type="reset" name="borrar" value="Limpiar Campos">
                </td>
            </tr>



        </table>

    </form>

    <form action="/proveedores/{{ $proveedoresTable->id }}" method="POST">
        {{ csrf_field() }}<!--permite enviar datos sin login-->
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Eliminar Registro" class="boton">
    </form>

@endsection


@section('pie')

@endsection

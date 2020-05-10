@extends('layouts/plantilla')

@section('cabecera')
EDITAR REGISTROS
@endsection

    
@section('contenido')<!--FORMULARIO DE EDICION DE REGISTROS-->

<form action="/servicios/{{ $servicio->id }}" method="POST">
        
        <table >
            <tr>
                <td>Id: </td>
                <td>
                    <input type="text" name="id" value="{{$servicio->id}}" disabled>
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    <input type="hidden" name="_method" value="PUT">
                </td>
            </tr>
            <tr>
                <td>Nombre: </td>
                <td>
                    <input type="text" name="nombre" value="{{$servicio->nombre}}">
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                </td>
            </tr>  
            <tr>
                <td>Descripcion: </td>
                <td>
                    <input type="text" name="descripcion" value="{{$servicio->descripcion}}">
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                </td>
            </tr> 
            <tr>
                <td>Zona: </td>
                <td>
                    <select name="idzona" id="idzona">
                        @foreach ($zona as $zon)
                    <option value="{{ $zon->id }}">{{ $zon->nombre }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tipo cliente</td>
                <td >
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                <input type="Radio" id="Persona" name="tipocliente"  value="Persona" {{ $servicio->tipocliente=="Persona" ? 'checked':false}}>
                    <label>Persona</label>
                <input type="Radio" id="Empresa" name="tipocliente" value="Empresa" {{ $servicio->tipocliente=="Empresa" ? 'checked':false}}>
                    
                    <label>Empresa</label>   
                                 
                    
                </td>
                
            </tr>

            <tr>
                <td>Factura:</td>
                <td>
                    <input type="checkbox" name="felectronica" value="electronica" {{ $servicio->felectronica=="electronica" ? 'checked':false}}>Electronica<br>
                    <input type="checkbox" name="ffisica" value="fisica" {{ $servicio->ffisica=="fisica" ? 'checked':false}}>Fisica<br>
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
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
    <form action="/servicios/{{ $servicio->id }}" method="POST">
        {{ csrf_field() }}<!--permite enviar datos sin login-->
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Eliminar Registro" class="boton">
    </form>
@endsection


@section('pie')
    
@endsection

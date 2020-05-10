@extends('layouts/plantilla')

@section('cabecera')
INSERTAR REGISTROS
@endsection

    
@section('contenido')<!--FORMULARIO DE INGRESO DE REGISTROS-->

    <form action="/servicios" method="POST">
        
        <table >
            <tr>
                <td>Nombre: </td>
                <td>
                    <input type="text" name="nombre">
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                </td>
            </tr>  
            <tr>
                <td>Descripcion: </td>
                <td>
                    <input type="text" name="descripcion">
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                </td>
            </tr> 
            <tr>
                <td>Zona: </td>
                <td>
                    <select name="idzona" id="idzona">
                        @foreach ($zonas as $zona)
                    <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
                        @endforeach
                    </select>
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                </td>
            </tr>
            <tr>
                <td>Tipo cliente</td>
                <td >
                    <input type="radio" id="persona" name="tipocliente" value="Persona" checked>
                    <label>Persona</label>
                    <input type="radio" id="empresa" name="tipocliente" value="Empresa">
                    <label>Empresa</label>
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    
                </td>
                

                
            </tr>
            
            <tr>
                <td>Factura:</td>
                <td>
                    <input type="checkbox" name="felectronica" value="electronica">Electronica<br>
                    <input type="checkbox" name="ffisica" value="fisica">Fisica<br>
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                </td>
            </tr>
        

            
            <tr>
                <td colspan="" align="center">
                    <input type="submit" name="enviar" value="Enviar"> 
                </td> 
                <td>
                    <input type="reset" name="borrar" value="Borrar">    
                </td>   
            </tr> 
           
            
                  
           
        </table>
            
    </form>
@endsection


@section('pie')
    
@endsection
@extends('layouts/plantilla')

@section('cabecera')
INSERTAR REGISTROS
@endsection

    
@section('contenido')<!--FORMULARIO DE INGRESO DE REGISTROS-->

    <form action="/servicios" method="POST">
        
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
                <td>Fecha envio: </td>
                <td>
                    <input type="date" id="start" name="fechaenvio"
                    value="{{ old('fechaenvio', date("Y-m-d")) }}"
                    min="2018-01-01" max="{{ date("y-m-d")}}">

                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    {!! $errors->first('fechaenvio','<div class="invalid-feedback">:message</div>') !!}
                </td>
                
            </tr>           

            
            
            <tr>
                <td>Nombre: </td>
                <td>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control {{ $errors->has('nombre')?'is-invalid':'' }}">
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
                    
                </td>
            </tr>  

            <tr>
                <td>Descripcion: </td>
                <td>
                <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control is-invalid">
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    {!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>') !!}
                </td>
            </tr> 

            <tr>
                <td>Zona: </td>
                <td>
                    <select name="idzona" id="idzona">
                        @foreach ($zonas as $zona)
                    <option value="{{ $zona->id }}" {{old('idzona')== $zona->id ? 'selected' :false}}>{{ $zona->nombre }}</option>
                        @endforeach
                    </select>
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                </td>
            </tr>

            <tr>
                <td>Tipo cliente</td>
                <td >
                    <input type="radio" id="persona" name="tipocliente" value="Persona" {{old('tipocliente')=='Persona'? 'checked' :false}}>
                    <label>Persona</label>
                    <input type="radio" id="empresa" name="tipocliente" value="Empresa" {{old('tipocliente')=='Empresa'? 'checked' :false}}>
                    <label>Empresa</label>
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    {!! $errors->first('tipocliente','<div class="invalid-feedback">:message</div>') !!}
                    
                </td>             
            </tr>
           
            <tr>
                <td>Factura:</td>
                <td>
                    <input type="checkbox" name="tipofactura[]" value="electronica" 
                    @if (is_array(old('tipofactura')) && in_array('electronica',old('tipofactura')))
                        checked
                    @endif
                    >Electronica<br>

                    <input type="checkbox" name="tipofactura[]" value="fisica" 
                    @if (is_array(old('tipofactura')) && in_array('fisica',old('tipofactura')))
                        checked
                    @endif
                    >Fisica<br>
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
    {{dd(old())}}
    
@endsection


@section('pie')
    
@endsection
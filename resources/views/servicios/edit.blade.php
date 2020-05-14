@extends('layouts/plantilla')

@section('cabecera')
EDITAR REGISTROS
@endsection

    
@section('contenido')<!--FORMULARIO DE EDICION DE REGISTROS-->

<form action="/servicios/{{ $servicio->id }}" method="POST">

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
            <td>{{$servicio->created_at->diffForHumans()}}</td>
            </tr>

            <tr>  
                     
                <td>Fecha Envio: </td>
                <td>
                    <input type="date" id="start" name="fechaenvio"
                    value="{{ old('fechaenvio', $servicio->fechaenvio) }}"
                    min="2018-01-01" max="{{ date("y-m-d")}}">

                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    {!! $errors->first('fechaprueba','<div class="invalid-feedback">:message</div>') !!}
                </td>
                
            </tr>

            
            <tr>
                
                <td>Id: </td>
                <td>
                    <input type="text" name="id" value="{{$servicio->id}}" disabled>
                    {{ csrf_field() }}<!--permite enviar datos sin login-->                    
                    <input type="hidden" name="_method" value="PATCH">                    
                </td>
            </tr>
            <tr>
                <td>Nombre: </td>
                <td>
                <input type="text" name="nombre" value="{{ old('nombre', $servicio->nombre) }} ">
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
                </td>
            </tr>  
            <tr>
                <td>Descripcion: </td>
                <td>
                    <input type="text" name="descripcion" value="{{ old('descripcion', $servicio->descripcion)}}">
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    {!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>') !!}
                </td>
            </tr> 
            <tr>
                <td>Zona: </td>
                <td>
                    <select name="idzona" id="idzona">                        
                        @foreach ($zona as $zon)
                    <option value="{{ $zon->id }}"{{old('idzona')== $zon->id ? 'selected' :false}}>{{ $zon->nombre }}</option>
                        @endforeach
                    </select>
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                </td>
            </tr>
            <tr>
                <td>Tipo cliente</td>
                <td >
                    
                    @if ($servicio->tipocliente=='Persona')
                        {{ csrf_field() }}<!--permite enviar datos sin login-->
                        <input type="Radio" id="tipocliente" name="tipocliente"  value="Persona" checked {{old('tipocliente')=='Persona' ? 'checked':false}}>
                            <label>Persona</label>
                        <input type="Radio" id="tipocliente" name="tipocliente" value="Empresa" {{old('tipocliente')=='Empresa'? 'checked' :false}}>
                        <label>Empresa</label>   
                        {!! $errors->first('tipocliente','<div class="invalid-feedback">:message</div>') !!}
                    
                    @elseif($servicio->tipocliente=='Empresa') 
                        {{ csrf_field() }}<!--permite enviar datos sin login-->
                        <input type="Radio" id="tipocliente" name="tipocliente" value="Empresa" checked {{old('tipocliente')=='Empresa'? 'checked' :false}}>
                        <label>Empresa</label>   
                        <input type="Radio" id="tipocliente" name="tipocliente"  value="Persona"  {{old('tipocliente')=='Persona' ? 'checked':false}}>
                        <label>Persona</label>
                        
                        {!! $errors->first('tipocliente','<div class="invalid-feedback">:message</div>') !!}

                    @endif                             
                    
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
    {{ dd(old())}}
@endsection


@section('pie')
    
@endsection

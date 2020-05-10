@extends('layouts/plantilla')

@section('cabecera')
REGISTROS EXISTENTES
@endsection

    
@section('contenido')<!--FORMULARIO PARA VISUALIZAR LOS REGISTROS-->




    <table border="1" >

        <tr>
            <th>Acciones</th>
            <th>No. Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Zona</th>
            <th>Cliente</th>
            <th>F. electronica</th>
            <th>F. fisica</th>
        </tr>        
        
        @foreach ($servicios as $servicio)
            <tr>
                <td class="icon"><a href="{{route('servicios.edit', $servicio->id)}}"><i class="far fa-edit center"></i></a></td>
                <td>{{ $servicio->id }}</a></td>
                <td>{{ $servicio->nombre }}</td>
                <td>{{ $servicio->descripcion}}</td>              
                <td>{{ $servicio->nombrezona}}</td>
                <td>{{ $servicio->tipocliente}}</td>
                <td>{{ $servicio->felectronica}}</td>
                <td>{{ $servicio->ffisica}}</td>
                
                
            </tr>
        @endforeach
    </table>

    

@endsection


@section('pie')
    
@endsection
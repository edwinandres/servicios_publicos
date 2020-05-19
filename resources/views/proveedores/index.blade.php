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

        </tr>

        @foreach ($proveedoresTable as $proveedor)


            @php
                //$service= \App\Servicio::findOrfail($servicio->id);
                //$proveedor = ($servicio->proveedor_id);
                //dd($proveedor)
                //$tarifa= \App\Tarifa::findOrFail($servicio->id);
            @endphp
            <tr>
                <td class="icon"><a href="{{route('proveedores.edit', $proveedor->id)}}"><i class="far fa-edit center"></i></a></td>
                <td>{{ $proveedor->id }}</a></td>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->descripcion}}</td>
            </tr>
        @endforeach
    </table>



@endsection


@section('pie')

@endsection


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
            <th>Tipo Factura</th>
            <th>FechaEnvio</th>
            <th>Tarifa</th>
        </tr>

        @foreach ($servicios as $servicio)

            @php
                $service= \App\Servicio::findOrfail($servicio->id);
                //$tarifa= \App\Tarifa::findOrFail($servicio->id);
            @endphp
            <tr>
                <td class="icon"><a href="{{route('servicios.edit', $servicio->id)}}"><i class="far fa-edit center"></i></a></td>
                <td>{{ $servicio->id }}</a></td>
                <td>{{ $servicio->nombre }}</td>
                <td>{{ $servicio->descripcion}}</td>
                <td>{{ $servicio->nombrezona}}</td>
                <td>{{ $servicio->tipocliente}}</td>

                <td>@foreach($service->tipofacturas as $tipofactura)
                        {{$tipofactura->nombre}}
                    @endforeach

                </td>
                <td>{{ $servicio->fechaenvio }}</td>
                <td>
                    @foreach($service->tarifas as $tarifa)
                    {{$tarifa->nombre}}
                    @endforeach
                </td>


            </tr>
        @endforeach
    </table>



@endsection


@section('pie')

@endsection

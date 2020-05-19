@extends('layouts/plantilla')

@section('cabecera')
INSERTAR REGISTROS
@endsection


@section('contenido')<!--FORMULARIO DE INGRESO DE REGISTROS-->
<div class="card border-primary">

    <!--<form action="/proveedores" method="POST">-->
    {!! Form::open(['url'=>'/proveedores', 'method'=>'post']) !!}

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
                <td>{!! Form::label('lblnombre', 'Nombre:') !!} </td>
                <td>

                    {!!  Form::text('nombre',old('nombre'), ['class'=>'form-control '.( $errors->has('nombre')?'is-invalid':'' ), ]) !!}

                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}

                </td>
            </tr>

            <tr>
                <td>Descripcion: </td>
                <td>
                <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control {{ $errors->has('descripcion')?'is-invalid':'' }}">
                    {{ csrf_field() }}<!--permite enviar datos sin login-->
                    {!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>') !!}
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

    {!! Form::close() !!}
    <!--</form>-->
   </div>


@endsection


@section('pie')

@endsection

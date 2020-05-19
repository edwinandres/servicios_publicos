<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Servicio;
use App\Tarifa;
use App\Tipofactura;
use App\Zona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setLocale('es');//muestra los mensajes en español
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$proveedoresTable = Proveedor::orderBy('id')->get();
        $proveedoresTable = Proveedor::all()->sortBy('id');


        return view('proveedores.index', compact("proveedoresTable"));//compact crea un array

        //$servicios = ServiciosPublico::all();

        /* INDAGAR SOBRE ESTE CODIGO *************************************************
        $beneficiarios = Departamento::whereHas('municipio', function($q) {
            $q->where('departamento_id', Input::get('depto'));
        })
        ->with(['corregimiento', 'barrio', 'beneficiario'])
        ->get();
        *******************************************************************************/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $proveedoresTable = Proveedor::all();
        return view('proveedores.create', compact("proveedoresTable"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        //VALIDACION DE LOS CAMPOS
        $campos=[
            'nombre' => 'required|string|min:2|max:15',
            'descripcion' => 'required|string|min:2|max:30',
        ];

        $mensaje=[
            "required"=>':attribute es requerido',
        ];
        $this->validate($request,$campos,$mensaje);



        //CREAR INSTANCIA Y GUARDAR
        $proveedor = new Proveedor;
        //$servicios->tipofactura= $arrayToString;
        $proveedor->nombre=$request->nombre;
        $proveedor->descripcion=$request->descripcion;

        $proveedor->save();



        return redirect("/proveedores/index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $servicio=Servicio::findOrFail($id);
        return view("servicios.show", compact("servicio"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proveedoresTable = Proveedor::find($id);

        return view("proveedores.edit", compact("proveedoresTable"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //VALIDACION DE LOS CAMPOS
        $campos=[
            'nombre' => 'required|string|min:2|max:15',
            'descripcion' => 'required|string|min:2|max:30',
        ];
        $mensaje=[
            "required"=>':attribute es requerido'

        ];
        $this->validate($request,$campos,$mensaje);



        //CREAR INSTANCIA Y ACTUALIZAR
        $proveedor = Proveedor::findOrFail($id);

        //$servicio->tipofactura= $arrayToString;
        $proveedor->nombre = $request->nombre;
        $proveedor->descripcion = $request->descripcion;

        $proveedor->update($request->all());


        return redirect("/proveedores/index");
        //return view('servicios.show', compact('servicio'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //   return view('delete');
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        return redirect("/proveedores/index");
    }
}

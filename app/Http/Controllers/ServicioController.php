<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Servicio;
//use App\ServiciosPublico;
use App\Tarifa;
use App\Tipofactura;
use App\Zona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        //
        $servicios = DB::table('servicios')
            ->join('zonas', 'zonas.id', '=', 'servicios.idzona')
            //->join('proveedors','proveedors.id','=','servicios.proveedor_id')
            ->select('servicios.*', 'zonas.nombre as nombrezona')//, 'proveedors.nombre as nombreproveedor')
            ->orderBy('id')
            ->get();

        $tipofacturas = Tipofactura::all();
        $tarifasData = Tarifa::all();
        $proveedoresTable = Proveedor::all();

        return view('servicios.index', compact("servicios", "tipofacturas", "tarifasData","proveedoresTable"));//compact crea un array

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
        $zonas = Zona::all();
        $tipos = Tipofactura::all();
        $tarifasData = Tarifa::all();
        $proveedoresTable = Proveedor::all();
        return view('servicios.create', compact("proveedoresTable","zonas","tipos","tarifasData"));
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
            'idzona' => 'required',
            'tipocliente' => 'required',
            'tipofactura'=>'required',
            'fechaenvio'=>'required|date|before:tomorrow|after:12/31/2019',
            'proveedor_id'=> 'required',
            'tarifasArray'=> 'required',

        ];

        $mensaje=[
            "required"=>':attribute es requerido',
            "before"=>':attribute es mayor a la permitida',
            "after"=>':attribute es menor a la permitida',
        ];
        $this->validate($request,$campos,$mensaje);

        //VALIDAR QUE ARRAY NO VENG VACIO
        if(isset($request['tipofactura'])){
            $arrayToString = implode(', ', $request->input('tipofactura'));
        }else{
            $arrayToString="";
        }

        //CREAR INSTANCIA Y GUARDAR
        $servicios = new Servicio;
        //$servicios->tipofactura= $arrayToString;

        $servicios->idzona=$request->idzona;
        $servicios->nombre=$request->nombre;
        $servicios->descripcion=$request->descripcion;
        $servicios->tipocliente=$request->tipocliente;
        $servicios->felectronica=$request->felectronica;
        $servicios->ffisica=$request->ffisica;
        $servicios->fechaenvio=$request->fechaenvio;
        $servicios->proveedor_id=$request->proveedor_id;

        $servicios->save();


        $service= \App\Servicio::all();
        $data = Servicio::latest('id')->first();
        $user= Servicio::all();
        echo($user->last());

        //GUARDADO EN TABLAS PIVOT
        foreach ($request['tipofactura'] as $tipof){
            Servicio::find($servicios->id)->tipofacturas()->attach($tipof);
        }
        foreach ($request['tarifasArray'] as $tarifa){
            Servicio::find($servicios->id)->tarifas()->attach($tarifa);
        }

        return redirect("/servicios/index");
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
        $tipos=Tipofactura::all();
        $zona= Zona::all();
        $tarifasData = Tarifa::all();
        $proveedoresTable = Proveedor::all();
        $servicio=Servicio::findOrFail($id);
        return view("servicios.edit", compact("servicio","zona", "tipos","tarifasData","proveedoresTable"));
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
            'idzona' => 'required',
            'tipocliente' => 'required',
            //'fechaprueba'=>'required|date|before:tomorrow|after:12/31/2019',
            'fechaenvio'=>'required|date|before:tomorrow|after:12/31/2019',
            'tipofactura'=>'required',
            'proveedor_id'=>'required'
        ];
        $mensaje=[
            "required"=>':attribute es requerido',
            "before"=>':attribute es mayor a la permitida',
            "after"=>':attribute es menor a la permitida',
        ];
        $this->validate($request,$campos,$mensaje);

        //VALIDAR QUE ARREGLO DE CHECKBOX NO VENGA VACIO
        if(isset($request['tipofactura'])){
            $arrayToString = implode(', ', $request->input('tipofactura'));
        }else{
            $arrayToString="";
        }


        //CREAR INSTANCIA Y ACTUALIZAR
        $servicio = Servicio::findOrFail($id);

        //$servicio->tipofactura= $arrayToString;
        $servicio->tipocliente = $request->tipocliente;
        $servicio->idzona = $request->idzona;
        $servicio->felectronica = $request->felectronica;
        $servicio->ffisica = $request->ffisica;
        $servicio->fechaenvio = $request->fechaenvio;
        $servicio->proveedor_id = $request->proveedor_id;

        $servicio->update($request->all());

        //BORRADO DE LOS DATOS EN PIVOT ANTES DE GUARDAR PARA NO DUPLICAR
        Servicio::find($id)->tipofacturas()->detach();
        Servicio::find($id)->tarifas()->detach();

        //INSERCION DE DATOS EN PIVOT
        foreach ($request['tipofactura'] as $tipof){
            Servicio::find($id)->tipofacturas()->attach($tipof);
        }
        foreach ($request['tarifasArray'] as $tarifa){
            Servicio::find($id)->tarifas()->attach($tarifa);
        }

        return redirect("/servicios/index");
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
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();
        return redirect("/servicios/index");
    }
}

<?php

namespace App\Http\Controllers;

use App\Zona;
use App\ServiciosPublico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;



class ServiciosPublicosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  
        $servicios = DB::table('servicios_publicos')
            ->join('zonas', 'zonas.id', '=', 'servicios_publicos.idzona')            
            ->select('servicios_publicos.*', 'zonas.nombre as nombrezona')
            ->get();        

        //$servicios = ServiciosPublico::all();
        return view('servicios.index', compact("servicios"));//compact crea un array


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
        return view('servicios.create', compact("zonas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //$request son los datos que vienen desde el formulario create
    public function store(Request $request)
    {
        //        return view('insert');
        $servicios = new ServiciosPublico;

        $servicios->idzona=$request->idzona;
        $servicios->nombre=$request->nombre;
        $servicios->descripcion=$request->descripcion;
        $servicios->tipocliente=$request->tipocliente;
        $servicios->felectronica=$request->felectronica;
        $servicios->ffisica=$request->ffisica;

        
        
        $servicios->save();
        return redirect("/servicios");
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
        $servicio=ServiciosPublico::findOrFail($id);
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
        
        $zona= Zona::all();
        $servicio=ServiciosPublico::findOrFail($id);
        return view("servicios.edit", compact("servicio","zona"));
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
        //        return view('update');
       
  
        $servicio = ServiciosPublico::findOrFail($id);

        $servicio->tipocliente = $request->tipocliente;
        $servicio->idzona = $request->idzona;
        $servicio->felectronica = $request->felectronica;
        $servicio->ffisica = $request->ffisica;

        $servicio->update($request->all());
        
        return redirect("/servicios");
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
        $servicio = ServiciosPublico::findOrFail($id);
        $servicio->delete();
        return redirect("/servicios");
    }
}

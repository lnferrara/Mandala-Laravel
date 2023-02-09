<?php

namespace App\Http\Controllers;
use App\Models\Gasto;
use App\Models\Ingreso;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresosEnero = Ingreso::orderBy('nombre', 'ASC')->where('periodo',1)->get();
        $ingresosFebrero = Ingreso::orderBy('nombre', 'ASC')->where('periodo',2)->get();
        $ingresosMarzo = Ingreso::orderBy('nombre', 'ASC')->where('periodo',3)->get();
        $ingresosAbril = Ingreso::orderBy('nombre', 'ASC')->where('periodo',4)->get();
        $ingresosMayo = Ingreso::orderBy('nombre', 'ASC')->where('periodo',5)->get();
        $ingresosJunio = Ingreso::orderBy('nombre', 'ASC')->where('periodo',6)->get();
        $ingresosJulio = Ingreso::orderBy('nombre', 'ASC')->where('periodo',7)->get();
        $ingresosAgosto = Ingreso::orderBy('nombre', 'ASC')->where('periodo',8)->get();
        $ingresosSeptiembre = Ingreso::orderBy('nombre', 'ASC')->where('periodo',9)->get();
        $ingresosOctubre = Ingreso::orderBy('nombre', 'ASC')->where('periodo',10)->get();
        $ingresosNoviembre = Ingreso::orderBy('nombre', 'ASC')->where('periodo',11)->get();
        $ingresosDiciembre = Ingreso::orderBy('nombre', 'ASC')->where('periodo',12)->get();
        
        $gastosEnero = Gasto::orderBy('servicio', 'ASC')->where('periodo',1)->get();
        $gastosFebrero = Gasto::orderBy('servicio', 'ASC')->where('periodo',2)->get();
        $gastosMarzo = Gasto::orderBy('servicio', 'ASC')->where('periodo',3)->get();
        $gastosAbril = Gasto::orderBy('servicio', 'ASC')->where('periodo',4)->get();
        $gastosMayo = Gasto::orderBy('servicio', 'ASC')->where('periodo',5)->get();
        $gastosJunio = Gasto::orderBy('servicio', 'ASC')->where('periodo',6)->get();
        $gastosJulio = Gasto::orderBy('servicio', 'ASC')->where('periodo',7)->get();
        $gastosAgosto = Gasto::orderBy('servicio', 'ASC')->where('periodo',8)->get();
        $gastosSeptiembre = Gasto::orderBy('servicio', 'ASC')->where('periodo',9)->get();
        $gastosOctubre = Gasto::orderBy('servicio', 'ASC')->where('periodo',10)->get();
        $gastosNoviembre = Gasto::orderBy('servicio', 'ASC')->where('periodo',11)->get();
        $gastosDiciembre = Gasto::orderBy('servicio', 'ASC')->where('periodo',12)->get();
        return view('gastos', ['gastosEnero'=>$gastosEnero,
                            'gastosFebrero'=>$gastosFebrero,
                            'gastosMarzo'=>$gastosMarzo,
                            'gastosAbril'=>$gastosAbril,
                            'gastosMayo'=>$gastosMayo,
                            'gastosJunio'=>$gastosJunio,
                            'gastosJulio'=>$gastosJulio,
                            'gastosAgosto'=>$gastosAgosto,
                            'gastosSeptiembre'=>$gastosSeptiembre,
                            'gastosOctubre'=>$gastosOctubre,
                            'gastosNoviembre'=>$gastosNoviembre,
                            'gastosDiciembre'=>$gastosDiciembre,
                            
                            
                            'ingresosEnero'=>$ingresosEnero,
                            'ingresosFebrero'=>$ingresosFebrero,
                            'ingresosMarzo'=>$ingresosMarzo,
                            'ingresosAbril'=>$ingresosAbril,
                            'ingresosMayo'=>$ingresosMayo,
                            'ingresosJunio'=>$ingresosJunio,
                            'ingresosJulio'=>$ingresosJulio,
                            'ingresosAgosto'=>$ingresosAgosto,
                            'ingresosSeptiembre'=>$ingresosSeptiembre,
                            'ingresosOctubre'=>$ingresosOctubre,
                            'ingresosNoviembre'=>$ingresosNoviembre,
                            'ingresosDiciembre'=>$ingresosDiciembre,
                        ]);
        
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingresoGastos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function validateForm(Request $request)
     {
         $request->validate(
             [
                 'nameGas' => 'required|min:2|max:60',
                 'importe' => 'required|numeric',
                 'mesGasto' => 'required',
                 
            ],
             [
                 'nameGas.required' => 'El servicio es obligatorio.',
                 'nameGas.min' => 'El servicio debe contener minimo 2 carácteres.',
                 'nameGas.max' => 'El servicio no puede superar los 60 carácteres.',
                 'importe.required' => 'El importe es obligatorio.',
                 'importe.numeric' => 'El importe solo puede contener números.',
                 'mesGasto.required' => 'El periodo/mes es requerido.',
            ]
 
         );
     }
     public function validateForm2(Request $request)
     {
         $request->validate(
             [
                 'nameGas' => 'required|min:2|max:60',
                 'importe' => 'required|numeric',
                 
                 
            ],
             [
                 'nameGas.required' => 'El servicio es obligatorio.',
                 'nameGas.min' => 'El servicio debe contener minimo 2 carácteres.',
                 'nameGas.max' => 'El servicio no puede superar los 60 carácteres.',
                 'importe.required' => 'El importe es obligatorio.',
                 'importe.numeric' => 'El importe solo puede contener números.',
                
            ]
 
         );
     }

   

    public function store(Request $request)
    {
        $this->validateForm($request);
        $gasto = new Gasto();
        $gasto->servicio = $request->nameGas;
        $gasto->importe = $request->importe;
        $gasto->periodo = $request->mesGasto;
        $gasto->save();
        return redirect('/ingresoGastos')
        ->with('mensaje', 'correcto');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gasto = Gasto::find($id);
        return view('editarGasto',['gasto'=>$gasto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validateForm2($request);
        $gasto= Gasto::find($request->id);
        $gasto->servicio = $request->nameGas;
        $gasto->importe = $request->importe;
        $gasto->save();
        return redirect('/gastos')
        ->with('mensaje', 'editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gasto = Gasto::destroy($id);
        return redirect('/gastos')
        ->with('mensaje', 'eliminado');
    }
}

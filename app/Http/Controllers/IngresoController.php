<?php

namespace App\Http\Controllers;
use App\Models\Ingreso;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingresoDinero');
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
                'nomIng' => 'required|min:2|max:60',
                'importeIng' => 'required|numeric',
                'periodo' => 'required',
                
           ],
            [
                'nomIng.required' => 'El servicio es obligatorio.',
                'nomIng.min' => 'El servicio debe contener minimo 2 carácteres.',
                'nomIng.max' => 'El servicio no puede superar los 60 carácteres.',
                'importeIng.required' => 'El importe es obligatorio.',
                'importeIng.numeric' => 'El importe solo puede contener números.',
                'periodo.required' => 'El periodo/mes es requerido.',
           ]

        );
    }
    public function validateForm2 (Request $request)
    {
        $request->validate(
            [
                'nomIng' => 'required|min:2|max:60',
                'importeIng' => 'required|numeric',
                
                
           ],
            [
                'nomIng.required' => 'El servicio es obligatorio.',
                'nomIng.min' => 'El servicio debe contener minimo 2 carácteres.',
                'nomIng.max' => 'El servicio no puede superar los 60 carácteres.',
                'importeIng.required' => 'El importe es obligatorio.',
                'importeIng.numeric' => 'El importe solo puede contener números.',
                
           ]

        );
    }

    public function store(Request $request)
    {
        $this->validateForm($request);
        $ingreso = new Ingreso();
        $ingreso->nombre = $request->nomIng;
        $ingreso->importe = $request->importeIng;
        $ingreso->periodo = $request->periodo;
        $ingreso->save();
        return redirect('/ingresoDinero')
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
        $ingreso = Ingreso::find($id);
        return view('editarImporte',['ingreso'=>$ingreso]);
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
        $ingreso= Ingreso::find($request->id);
        $ingreso->nombre = $request->nomIng;
        $ingreso->importe = $request->importeIng;
        $ingreso->save();
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
        $ingreso = Ingreso::destroy($id);
        return redirect('/gastos')
         ->with('mensaje', 'eliminado');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $empresas = Empresa::orderBy('nombreEmpresa', 'ASC')->paginate(10);
        return view('adminEmpresas', ['empresas'=>$empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingresarEmpresa');
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
                'nameEmp' => 'required|min:2|max:60',
                'cuit' => 'required|min:11|numeric',
                

            ],
            [
                'nameEmp.required' => 'La razón social es obligatoria.',
                'nameEmp.min' => 'La razón social debe contener minimo 2 carácteres.',
                'nameEmp.max' => 'La razón social no puede superar los 60 carácteres.',
                'cuit.required' => 'El cuit es obligatorio.',
                'cuit.min' => 'El cuit debe contener minimo 11 carácteres.',
                'cuit.max' => 'El cuit no puede superar los 11 carácteres.',
                'cuit.numeric' => 'El cuit solo puede contener números.',
                




            ]



        );
    }

    
    
     public function store(Request $request)
    {
        $this->validateForm($request);
        $empresa = new Empresa();
        $empresa->nombreEmpresa = $razonSocial = $request->nameEmp;
        $empresa->cuit = $request->cuit;
        $empresa->save();
        return redirect('/empresas')
        ->with(['mensaje'=> "La empresa $razonSocial ha sido ingresada con éxito."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return view('modificarEmpresa',['empresa'=>$empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validateForm($request);
        $empresa = Empresa::find($request->Idempresa);
        $empresa->nombreEmpresa =  $request->nameEmp;
        $empresa->cuit =  $request->cuit;
        $empresa->save();
        
        return redirect('/empresas')
        ->with(['mensaje'=> "La empresa  ha sido modificada con éxito."]);
    }


    public function confirmDelete($id)
    {
        $empresa = Empresa::find($id);
        return view('eliminarEmpresa', ['empresa'=>$empresa]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $empresa = Empresa::destroy($request->Idempresa);
       return redirect('/empresas')
        ->with(['danger'=>"La empresa ha sido eliminada con éxito."]);
    }
}

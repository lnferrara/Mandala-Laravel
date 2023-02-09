<?php

namespace App\Http\Controllers;

use App\Models\Profesional;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empresas = Empresa::all();
        $profesionales = Profesional::orderBy('nombre', 'ASC')
            ->with(['getEmpresa'])->paginate(10);
        return view('adminProfesionales', [
            'profesionales' => $profesionales,
            'empresas' => $empresas,

        ]);
    }

    public function birthday()
    {

        $date = Carbon::now()->format('m-d');
        $date2 = Carbon::now()->format('Y-m');

        $profesionales = Profesional::whereDate('fechaNacimiento', 'like', '%' . $date)->get();
        $ingresos = Profesional::whereDate('fechaIngreso', 'like', $date2 . '%')->get();

        /* dd($date); */
        return view('dashboard', [
            'profesionales' => $profesionales,
            'ingresos' => $ingresos,
        ]);
    }


    public function newRevenue()
    {
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        return view('ingresarProfesional', ['empresas' => $empresas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateForm($request);

        $profesional = new Profesional();
        $profesional->nombre = $nameprof = $request->nameprof;
        $profesional->apellido = $surnameprof = $request->surnameprof;
        $profesional->dni =  $request->dniprof;
        $profesional->email =  $request->mailprof;
        $profesional->telefono =  $request->tel;
        $profesional->fechaIngreso =  $request->fechaprof;
        $profesional->fechaNacimiento =  $request->fechanac;

        $profesional->Idempresa =  $request->empresa;

        $profesional->save();
        return redirect('/profesionales')
        ->with('mensaje', 'ingreso');;
    }



    public function validateForm(Request $request)
    {
        $request->validate(
            [
                'nameprof' => 'required|min:2|max:60',
                'surnameprof' => 'required|min:2|max:60',
                'dniprof' => 'required|numeric',
                'mailprof' => 'required|min:2|email',
                'fechaprof' => 'required',
                'empresa' => 'required'

            ],
            [
                'nameprof.required' => 'El Nombre es obligatorio.',
                'nameprof.min' => 'El Nombre debe contener minimo 2 carácteres.',
                'nameprof.max' => 'El Nombre no puede superar los 60 carácteres.',
                'surnameprof.required' => 'El apellido es obligatorio.',
                'surnameprof.min' => 'El apellido debe contener minimo 2 carácteres.',
                'surnameprof.max' => 'El apellido no puede superar los 60 carácteres.',
                'dniprof.required' => 'El Dni es obligatorio.',

                'dniprof.numeric' => 'El Dni debe ser númerico.',
                'mailprof.required' => 'El email es obligatorio.',
                'mailprof.min' => 'El email debe contener al menos 2 carácteres.',
                'mailprof.email' => 'El email ingresado no es correcto.',
                'fechaprof.required' => 'La fecha de ingreso es obligatoria.',
                'empresa.required' => 'La empresa es obligatoria.'




            ]



        );
    }






    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesional  $profesional
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $profesional = Profesional::with(['getEmpresa'])->find($id);
        return view('fichaProfesional', ['profesional' => $profesional]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesional  $profesional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* $empresas = Empresa::all();
        $profesional = Profesional::with(['getEmpresa'])->find($id);

        return view('modificarProfesional', ['profesional' => $profesional, 'empresas' => $empresas]); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesional  $profesional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validateForm($request);
        $profesional = Profesional::find($request->Id);
        $profesional->nombre =  $request->nameprof;
        $profesional->apellido =  $request->surnameprof;
        $profesional->telefono = $request->tel;
        $profesional->dni = $request->dniprof;
        $profesional->email = $request->mailprof;
        $profesional->fechaNacimiento =  $request->fechanac;
        $profesional->fechaIngreso = $request->fechaprof;
        $profesional->idempresa = $request->empresa;

        $profesional->save();
        return redirect('/profesionales')->with('mensaje', 'editado');
    }

    // modifica comentarios de ficha

    public function updateObs(Request $request)
    {


        $profesional = Profesional::find($request->Id);
        $profesional->observaciones = $request->obs;
        $profesional->fechaComentario = Carbon::now();
        /* $profesional->usuario = $request->user; */
        $profesional->save();

        return redirect('/profesionales');
    }



  /*   public function confirmDelete($id)
    {
        $profesional = Profesional::find($id);
        return view('eliminarProfesional', ['profesional' => $profesional]);
    } */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesional  $profesional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $profesional = Profesional::destroy($request->Id);
        return redirect('/profesionales')
            ->with('mensaje', 'eliminado');
    }
}

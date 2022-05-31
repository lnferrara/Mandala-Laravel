<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modificación de Profesionales
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('layouts.errors')
                    <form action="/modificarProfesional" method="POST">
                        @method('put')
                        @csrf

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="nameprof"
                                value="{{old('nameprof', $profesional->nombre)}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="surnameprof"
                                value="{{old('surnameprof',$profesional->apellido)}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Dni</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2" name="dniprof"
                                value="{{old('dniprof', $profesional->dni)}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2"
                                  name="fechanac"   value="{{old('fechanac', $profesional->fechaNacimiento)}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Telefóno</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2"
                                  name="tel"  value="{{old('tel', $profesional->telefono)}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Email</label>
                            <input type="email" class="form-control" id="formGroupExampleInput2" name="mailprof"
                                value="{{old('mailprof', $profesional->email)}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Fecha de Ingreso</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="fechaprof"
                                value="{{old('fechaprof', $profesional->fechaIngreso)}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Empresa</label> <br>
                            <select name="empresa" id="">
                                <option value="">Seleccione Empresa</option>
                                @foreach($empresas as $empresa)
                                <option {{(old('empresa', $profesional->idempresa)==$empresa->Idempresa?
                                    "selected":"")}} value="{{$empresa->Idempresa}}">{{$empresa->nombreEmpresa}}
                                </option>

                                @endforeach

                            </select>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Estado Civíl</label> <br>
                                <select name="estadoCivil" id="">
                                    <option value="">Seleccione Estado</option>
                                    <option value="Soltero/a">Soltero/a</option>
                                    <option value="Casado/a">Casado/a</option>
                                    <option value="Divorciado/a">Divorciado/a</option>
                                    <option value="Viudo/a">Viudo/a</option>
                                    <option value="No definido/a">No definido/a</option>
                                        
                                    
    
                                </select>
                               
                            </div>

                            <input type="hidden" name="Id" value="{{$profesional->Id}}">
                        </div>
                        <br>
                        <button class="btn btn-dark btn-sm">Confirmar</button>
                        <a href="/profesionales" class="btn btn-secondary btn-sm" role="button">Volver</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @include('layouts.errors')

    </div>
</x-app-layout>
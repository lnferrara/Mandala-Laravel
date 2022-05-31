<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modificación de Empresas
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('layouts.errors')
                    <form action="/modificarEmpresa" method="POST">
                        @method('put')
                        @csrf

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Razón Social</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="nameEmp"
                                value="{{old('nameEmp', $empresa->nombreEmpresa)}}">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Cuit</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="cuit"
                                value="{{old('cuit', $empresa->cuit)}}">
                                <input type="hidden" name="Id" value="{{$empresa->Idempresa}}">
                        </div>

                        <button class="btn btn-dark btn-sm">Modificar</button>
                        <a href="/empresas" class="btn btn-secondary btn-sm" role="button">Volver</a>
                </div>
                
                <br>
                
                </form>

            </div>
        </div>
    </div>
    </div>


</x-app-layout>
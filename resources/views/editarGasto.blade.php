<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modificación de Gasto 🖊
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('layouts.errors')
                    <form action="/editarGasto" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nombre</label>
                            <input type="text" class="form-control-sm" id="formGroupExampleInput" name="nameGas"
                                value="{{old('nomIng', $gasto->servicio)}} ">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Importe</label>
                            <input type="text" class="form-control-sm" id="formGroupExampleInput2" name="importe"
                                value=" {{old('importeIng', $gasto->importe) }} ">
                        </div>
                        
                        <input type="hidden" name="id" value="{{$gasto->id}}">

                        <button class="btn btn-dark btn-sm" id="ingresarGasto">Confirmar</button>
                        <a href="/gastos" class="btn btn-secondary btn-sm" role="button">Volver</a>
                </div>
                <br>

                </form>

            </div>
        </div>
    </div>
    </div>

</x-app-layout>
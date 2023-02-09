<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ingreso de Gastos
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ( session('mensaje' ) == 'correcto' )
                    <script>
                        Swal.fire(
                        'Se ha ingresado el Item correctamente',
                                                            '',
                            'success'
                                        )
                    </script>

                    @endif
                    @include('layouts.errors')
                    <form action="/ingresoGastos" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nombre</label>
                            <input type="text" class="form-control-sm" id="formGroupExampleInput" name="nameGas"
                                value="{{old('nameGas')}}">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Importe</label>
                            <input type="text" class="form-control-sm" id="formGroupExampleInput2" name="importe"
                                value=" {{old('importe')}}">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Periodo/Mes</label>
                            <select name="mesGasto" id="mesGasto">
                                <option disabled selected value="0">Seleccionar Mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>

                        <button class="btn btn-dark btn-sm" id="ingresarGasto">Ingresar</button>
                        <a href="/gastos" class="btn btn-secondary btn-sm" role="button">Volver</a>
                </div>
                <br>

                </form>

            </div>
        </div>
    </div>
    </div>

{{-- <script>
    let button = document.getElementById('ingresarGasto')

button.addEventListener('click', function(e){
    e.prevent
    
    Swal.fire({
        icon: 'success',
        title: '',
        text: 'Servicio Ingresado con Exito',
        
      })
})

</script> --}}
</x-app-layout>
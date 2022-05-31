<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Eliminar Profesional
        </h2>
    </x-slot>
    <div class="py-12 popup" style="background: rgba(255, 0, 0, 0.558)" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                <div class="p-6 bg-white border-b border-gray-200" >
                    <form action="/eliminarProfesional" method="POST" >
                        @method('delete')
                        @csrf
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="nameprof"
                                value="{{$profesional->nombre}}">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="surnameprof"
                                value="{{$profesional->apellido}}">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Dni</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2" name="dniprof"
                                value="{{$profesional->dni}}">
                        </div>
                        <input type="hidden" name="Id" value="{{$profesional->Id}}">
                        <br>
                        <button class="btn btn-danger btn-sm" id="delete">Eliminar</button>
                        <a href="/profesionales" class="btn btn-secondary btn-sm" role="button">Volver</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
    Swal.fire({
  icon: 'error',
  title: 'Atención...',
  text: 'Si presiona el botón Eliminar el usuario quedará eliminado de su Base de Datos',
  footer: '<a href="/profesionales">Volver al menú principal</a>'
})
     
    </script>
</x-app-layout>
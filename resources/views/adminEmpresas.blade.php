<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Empresas
    </h2>
  </x-slot>
  @if ( session('mensaje') == 'eliminado' )
  <script>
    Swal.fire(
'Empresa Eliminada Correctamente!',
'',
'success'
)
  </script>
  @elseif(session('mensaje') == 'editado')
  <script>
    Swal.fire(
'Cambios Guardados',
'',
'success'
)
  </script>
  @elseif(session('mensaje') == 'ingreso')
  <script>
    Swal.fire(
'Empresa ingresada con Exito',
'',
'success'
)
  </script>
  @endif

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="table">
            <thead>
              <tr>

                <th scope="col">Razón Social</th>
                <th scope="col">Cuit</th>


              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($empresas as $empresa)


                <td hidden>{{$empresa->Idempresa}}</td>
                <td>{{$empresa->nombreEmpresa}}</td>
                <td>{{$empresa->cuit}}</td>


                <td><button class="btn btn-warning" title="Modificar" data-bs-toggle="modal"
                    data-bs-target="#editEmpresaModal-{{$empresa->Idempresa}}"><svg xmlns="http://www.w3.org/2000/svg"
                      width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                      <path
                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                    </svg></button></td>
                <td><button class="btn btn-danger" title="Eliminar" data-bs-toggle="modal"
                    data-bs-target="#deleteEmpresaModal-{{$empresa->Idempresa}}"><svg xmlns="http://www.w3.org/2000/svg"
                      width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path
                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                    </svg></button></td>




              </tr>
              {{-- Modal Ingreso nueva empresa --}}

              <div class="modal fade" id="ingresoEmp" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Empresa</h1>
                      <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                          @include('layouts.errors')
                          <form action="/empresas" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="formGroupExampleInput" class="form-label">Razón Social</label>
                              <input type="text" class="form-control" id="formGroupExampleInput" name="nameEmp"
                                value="{{old('nameEmp')}}">
                            </div>
                            <div class="mb-3">
                              <label for="formGroupExampleInput2" class="form-label">Cuit</label>
                              <input type="text" class="form-control" id="formGroupExampleInput2" name="cuit"
                                value="{{old('cuit')}}">
                            </div>
                            <div class="modal-footer">
                            <button class="btn btn-dark ">Ingresar</button>
                            <a class="btn btn-secondary" data-bs-dismiss="modal" role="button">Volver</a>
                          </div>
                        </div>
                      
                        </form>

                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>


              <!-- Modal Editar -->
              <div class="modal fade" id="editEmpresaModal-{{$empresa->Idempresa}}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Empresa :<b>
                          {{$empresa->nombreEmpresa}} </b></h1>
                      <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                          @include('layouts.errors')
                          <form action="/empresas" method="POST">
                            @method('put')
                            @csrf

                            <div class="mb-3">
                              <label for="formGroupExampleInput" class="form-label">Razón Social</label>
                              <input type="text" class="form-control" id="formGroupExampleInput" name="nameEmp"
                                value="{{old('nameEmp', $empresa->nombreEmpresa)}}">
                            </div>
                            <div class="mb-3">
                              <label for="formGroupExampleInput2" class="form-label">Cuit</label>
                              <input type="num" class="form-control" id="formGroupExampleInput2" name="cuit"
                                value="{{old('cuit', $empresa->cuit)}}">
                              <input type="hidden" name="Id" value="{{$empresa->Idempresa}}">
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-warning ">Modificar</button>
                              <a data-bs-dismiss="modal" class="btn btn-secondary" role="button">Cerrar</a>
                            </div>

                        </div>
                        </form>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- Modal Eliminar -->
              <div class="modal fade" id="deleteEmpresaModal-{{$empresa->Idempresa}}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Empresa :<b>
                          {{$empresa->nombreEmpresa}} </b></h1>
                      <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                          <div class="p-6 bg-white border-b border-gray-200">
                            @include('layouts.errors')
                            <form action="/empresas" method="POST" id="deleteEmp">
                              @method('delete')
                              @csrf

                              <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Razón Social</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" name="nameEmp"
                                  value="{{$empresa->nombreEmpresa}}">
                              </div>
                              <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Cuit</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="cuit"
                                  value="{{$empresa->cuit}}">
                                <input type="hidden" name="Id" value="{{$empresa->Idempresa}}">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-danger" id="deleteEmp">Eliminar</button>
                            <a data-bs-dismiss="modal" class="btn btn-secondary" role="button">Cerrar</a>
                          </div>
                          </form>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                {{-- fin modal --}}
                @endforeach
          </table>
          <button class="btn btn-dark" title="Agregar Empresa" data-bs-toggle="modal" data-bs-target="#ingresoEmp"><svg
              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
              <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
              </svg></button>
              {{$empresas->links()}}
            </div>
          </div>
        </div>
      </div>
  <script>
let button = document.getElementById('deleteEmp')
 button.addEventListener('submit', function(e){
  e.preventDefault()
  Swal.fire({
  title: '¿Estás seguro?',
  text: "Se eliminará el registro de forma definitiva",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, deseo Eliminar!',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
  
this.submit()
  }
})
 })
  </script>

</x-app-layout>
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
      Profesionales
    </h2>
  </x-slot>
  @if ( session('mensaje') == 'eliminado' )
  <script>
    Swal.fire(
'Profesional Eliminado Correctamente!',
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
'Profesional ingresado con Exito',
'',
'success'
)
</script>

  @endif

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="table">
            <thead>
              <tr>

                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Dni</th>
                <th scope="col">Empresa</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach($profesionales as $profesional)
                <td>{{$profesional->nombre}}</td>
                <td>{{$profesional->apellido}}</td>
                <td>{{$profesional->dni}}</td>
                <td>{{$profesional->getEmpresa->nombreEmpresa}}</td>
                <td><button title="Ver Ficha" class="btn btn-primary" data-bs-toggle="modal"
                  data-bs-target="#fichauser-{{$profesional->Id}}"><svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        <path
                          d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                      </svg></button></td>
                <td><button title="Editar" class="btn btn-secondary" data-bs-toggle="modal"
                  data-bs-target="#editarModal-{{$profesional->Id}}"><svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path
                          d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                      </svg></button></td>
                <td><button title="Eliminar" class="btn btn-danger" data-bs-toggle="modal"
                  data-bs-target="#eliminarProfesional-{{$profesional->Id}}" id="eliminar-{{$profesional->Id}}"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path
                          d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                      </svg></button></td>





              </tr>
              <!-- Modal editar -->
              <div class="modal fade" id="editarModal-{{$profesional->Id}}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Profesional </h1>
                      <button  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/profesionales" method="POST">
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
                          <input type="date" class="form-control" id="formGroupExampleInput2" name="fechanac"
                            value="{{old('fechanac', $profesional->fechaNacimiento)}}" required>
                        </div>
                        <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Telefóno</label>
                          <input type="number" class="form-control" id="formGroupExampleInput2" name="tel"
                            value="{{old('tel', $profesional->telefono)}}" required>
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
                         <input type="hidden" name="Id" value="{{$profesional->Id}}">
                        </div>
                        
                        <div class="modal-footer">
                        <button class="btn btn-dark ">Confirmar</button>
                        <a data-bs-dismiss="modal" class="btn btn-secondary " role="button">Volver</a>
                        </div>
                      </form>

                    </div>

                  </div>
                </div>
              </div>
              <!-- Modal Eliminar-->

              <div class="modal fade" id="eliminarProfesional-{{$profesional->Id}}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Profesional</h1>
                      <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                          <div class="p-6 bg-white border-b border-gray-200">
                            <form action="/profesionales" method="POST" id="deleteProf">
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

                              <div class="modal-footer">
                                <button class="btn btn-danger ">Eliminar</button>
                                <a data-bs-dismiss="modal" class="btn btn-secondary " role="button">Volver</a>


                              </div>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
        </div>
        <!-- Modal Ficha usuario -->
        <div class="modal fade" id="fichauser-{{$profesional->Id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ficha profesional : <b> {{$profesional->nombre}}
                  {{$profesional->apellido}}</b></h1>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="py-12">
                  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-6 bg-white border-b border-gray-200">
                        <div class="text-center"><img src="/images/noDisponible.jpg" alt="" class="rounded">
                        </div>
                        <div class="alert alert-success " role="alert">
                          <div><b>Id Profesional</b>: {{$profesional->Id}}</div>
                          <div><b>Nombre</b>: {{$profesional->nombre}}</div>
                          <div><b>Apellido</b>: {{$profesional->apellido}}</div>
                          <div><b>Dni</b>: {{$profesional->dni}}</div>
                          <div><b>Fecha de Nacimiento</b>:
                            {!!\Carbon\Carbon::parse($profesional->fechaNacimiento)->format('d-m-Y')!!}</div>
                          
                          <div><b>Correo Electrónico</b>: {{$profesional->email}}</div>
                          <div><b>Teléfono</b>: {{$profesional->telefono}}</div>
                          <div><b>Fecha de Ingreso</b>:
                            {!!\Carbon\Carbon::parse($profesional->fechaIngreso)->format('d-m-Y')!!}</div>
                          <div><b>Empresa Actual</b>: {{$profesional->getEmpresa->nombreEmpresa}}</div>
                        </div>
                        <br>
                        <div class="alert alert-success " role="alert"> <b><svg style="display: inline"
                              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                              class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                              <path
                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </svg> Último Feedback</b>:
                          @if($profesional->observaciones != "")
                          <div><svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                              fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                              <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg> Usuario: {{$profesional->usuario}}</div>
                          <div><svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                              fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                              <path
                                d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                              <path
                                d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            </svg> Fecha:
                            {!!\Carbon\Carbon::parse($profesional->fechaComentario)->format('d-m-Y')!!}</div>
                          <div><svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                              fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                              <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg> Comentario: "{{$profesional->observaciones}}" </div>
                          @else No se verifican registros para este profesional.
                          @endif
                        </div>
                        <br><br>

                        <form action="/profesionales" method="POST">
                          @csrf
                          @method('post')
                          <label for=""><b>Observaciones</b>:</label>
                          <br>
                          <textarea name="obs" id="" cols="30" rows="10"
                            style="resize: none">{{$profesional->Observaciones}}</textarea> <br>
                          <input type="hidden" name="Id" value="{{$profesional->Id}}">
                          <input type="hidden" name="user" value="{{ Auth::user()->name }}">
                          <button class="btn btn-primary btn-sm">Guardar</button>


                        </form>





                        <br>


                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>

              </div>
            </div>
          </div>
        </div>
        @endforeach
        </table>
        <button title="Ingresar nuevo Profesional" class="btn btn-success"><a href="/ingresarProfesional"> <svg
              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-person-plus-fill" viewBox="0 0 16 16">
              <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
              <path fill-rule="evenodd"
                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
            </svg></a> </button>
        {{$profesionales->links()}}
      </div>
    </div>
  </div>
  </div>

  <script>
    let button = document.getElementById('deleteProf')
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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ficha profesional : {{$profesional->nombre}} {{$profesional->apellido}}
        </h2>
    </x-slot>
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
                        <div><b>Edad</b>: {{$profesional->edad}}</div>
                        <div><b>Estado Civíl</b>: {{$profesional->estado}}</div>
                        <div><b>Correo Electrónico</b>: {{$profesional->email}}</div>
                        <div><b>Teléfono</b>: {{$profesional->telefono}}</div>
                        <div><b>Fecha de Ingreso</b>:
                            {!!\Carbon\Carbon::parse($profesional->fechaIngreso)->format('d-m-Y')!!}</div>
                        <div><b>Empresa Actual</b>: {{$profesional->getEmpresa->nombreEmpresa}}</div>
                    </div>
                    <br>
                    <div class="alert alert-success " role="alert"> <b><svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                      </svg> Último Feedback</b>:
                        @if($profesional->observaciones != "")
                        <div><svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                          </svg> Usuario: {{$profesional->usuario}}</div>
                        <div><svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                            <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                          </svg> Fecha: {!!\Carbon\Carbon::parse($profesional->fechaComentario)->format('d-m-Y')!!}</div>
                        <div><svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg> Comentario: "{{$profesional->observaciones}}" </div>
                        @else No se verifican registros para este profesional.
                        @endif
                    </div>
                    <br><br>

                    <form action="/fichaProfesional" method="POST">
                        @csrf
                        @method('put')
                        <label for=""><b>Observaciones</b>:</label>
                        <br>
                        <textarea name="obs" id="" cols="30" rows="10"
                            style="resize: none">{{$profesional->Observaciones}}</textarea> <br>
                        <input type="hidden" name="Id" value="{{$profesional->Id}}">
                        <input type="hidden" name="user" value="{{ Auth::user()->name }}">
                        <button class="btn btn-primary btn-sm">Guardar</button>


                    </form>





                    <br>
                    <a href="/profesionales" class="btn btn-secondary btn-sm" role="button">Volver</a>

                </div>
            </div>
        </div>

    </div>


</x-app-layout>
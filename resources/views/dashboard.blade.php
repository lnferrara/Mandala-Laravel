<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Bienvenid@, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <b>Ingresos de este mes 📣</b> :
                  @if($ingresos->count() >= 1)
                 @foreach($ingresos as $ingreso)
                  <p>◾ {{$ingreso->nombre}} {{$ingreso->apellido}}</p> <br>
                      
                  @endforeach 
                  @else
                  <p>No se registraron nuevos ingresos.</p>
                  @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <b>Cumpleaños hoy 🎂</b> :
                   @if($profesionales->count() >= 1)
                 @foreach($profesionales as $profesional)
                  <p>◾ {{$profesional->nombre}} {{$profesional->apellido}}</p> <br>
                      
                  @endforeach 
                  @else
                  <p>No hay cumpleaños en el día de hoy.</p>
                  @endif
                </div>
            </div>
        </div>
    </div>
 
</x-app-layout>
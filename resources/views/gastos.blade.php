<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Gastos Mensuales
        </h1>
    </x-slot>
    <div class="py-12">
        @if ( session('mensaje') == 'eliminado' )
        <script>
            Swal.fire(
      'Eliminado Correctamente!',
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


        @endif




        <h2 class="title">Control de Gastos 📋</h2>
        <div class="buttons-div">
            <a class="button-ingreso hola" href="/ingresoDinero">+ Nuevo Ingreso</a>
            <a class="button-gasto" href="/ingresoGastos">+ Nuevo Gasto</a>
        </div>
        <div class="flex-box">
            @php
            $sumaEne= 0;
            $restoEne=0;
            @endphp
            <div class="section-gasto">
                <h3 class="title-section">ENERO 🗓</h3>
                <hr>
                @foreach($ingresosEnero as $ingresoEnero)
                <p class="p-section-ingreso">+ {{$ingresoEnero->nombre}}: ${{number_format($ingresoEnero->importe, 2, ",", ".")}} <a
                    href="/editarImporte/{{$ingresoEnero->id}}" title="Editar">🖊 </a>
                <a href="/eliminarImporte/{{$ingresoEnero->id}}" title="Eliminar">| ❌</a> </p>
                </p>
                @php
                $restoEne+=$ingresoEnero->importe;
                @endphp
                @endforeach
                @foreach ($gastosEnero as $enero)
                <p class="p-section">- {{$enero->servicio}}: ${{number_format($enero->importe, 2, ",", ".")}} <a
                    href="/editarGasto/{{$enero->id}}" title="Editar"> 🖊</a>
                <a href="/eliminarGasto/{{$enero->id}}" title="Eliminar">| ❌</a></p>
                </p>
                @php
                $sumaEne+=$enero->importe;
                @endphp
                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldoene=$restoEne-=$sumaEne
                    @endphp
                    ${{number_format($saldoene, 2, ",", ".")}}
                </div>

            </div>
            <div class="section-gasto">
                @php
                $sumaFeb= 0;
                $restoFeb=0;
                @endphp
                <h3 class="title-section">FEBRERO 🗓</h3>
                <hr>
                @foreach($ingresosFebrero as $ingresoFeb)
                <p class="p-section-ingreso">+ {{$ingresoFeb->nombre}}: ${{number_format($ingresoFeb->importe, 2, ",", ".")}} <a
                    href="/editarImporte/{{$ingresoFeb->id}}" title="Editar">🖊 </a>
                <a href="/eliminarImporte/{{$ingresoFeb->id}}" title="Eliminar">| ❌</a> </p>
                @php
                $restoFeb+=$ingresoFeb->importe;
                @endphp
                @endforeach
                @foreach ($gastosFebrero as $febrero)
                <p class="p-section">- {{$febrero->servicio}}: ${{number_format($febrero->importe, 2, ",", ".")}} <a
                    href="/editarGasto/{{$febrero->id}}" title="Editar"> 🖊</a>
                <a href="/eliminarGasto/{{$febrero->id}}" title="Eliminar">| ❌</a></p>
                @php
                $sumaFeb+=$febrero->importe;
                @endphp
                
                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldofe=$restoFeb-=$sumaFeb
                    @endphp
                    ${{number_format($saldofe, 2, ",", ".")}}
                </div>
            </div>
            <div class="section-gasto">
                @php
                $sumam= 0;
                $restom=0;
                @endphp
                <h3 class="title-section">MARZO 🗓</h3>
                <hr>
                @foreach($ingresosMarzo as $ingresoMarzo)
                <p class="p-section-ingreso">+ {{$ingresoMarzo->nombre}}: ${{number_format($ingresoMarzo->importe, 2, ",", ".")}} <a
                        href="/editarImporte/{{$ingresoMarzo->id}}" title="Editar">🖊 </a>
                    <a href="/eliminarImporte/{{$ingresoMarzo->id}}" title="Eliminar">| ❌</a>
                </p>

                @php
                $restom+=$ingresoMarzo->importe;
                @endphp

                @endforeach
                @foreach ($gastosMarzo as $marzo)
                <p class="p-section delete">- {{$marzo->servicio}}: ${{number_format($marzo->importe, 2, ",", ".")}} <a
                        href="/editarGasto/{{$marzo->id}}" title="Editar"> 🖊</a>
                    <a href="/eliminarGasto/{{$marzo->id}}" title="Eliminar">| ❌</a>
                </p>

                @php
                $sumam+=$marzo->importe;
                @endphp

                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldoma=$restom-=$sumam
                    @endphp
                    ${{number_format($saldoma, 2, ",", ".")}}
                </div>

            </div>
            <div class="section-gasto">
                @php
                $sumaAbri= 0;
                $restoAbri=0;
                @endphp
                <h3 class="title-section">ABRIL 🗓</h3>
                <hr>
                @foreach($ingresosAbril as $ingresoAbril)
                <p class="p-section-ingreso">+ {{$ingresoAbril->nombre}}: ${{number_format($ingresoAbril->importe, 2, ",", ".")}} <a
                    href="/editarImporte/{{$ingresoAbril->id}}" title="Editar">🖊 </a>
                <a href="/eliminarImporte/{{$ingresoAbril->id}}" title="Eliminar">| ❌</a></p>
                @php
                $restoAbri+=$ingresoAbril->importe;
                @endphp
                @endforeach
                @foreach ($gastosAbril as $abril)
                <p class="p-section">- {{$abril->servicio}}: ${{number_format($abril->importe, 2, ",", ".")}} <a
                    href="/editarGasto/{{$abril->id}}" title="Editar"> 🖊</a>
                <a href="/eliminarGasto/{{$abril->id}}" title="Eliminar">| ❌</a></p>
                @php
                $sumaAbril+=$abril->importe;
                @endphp
                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldoabri=$restoAbri-=$sumaAbri
                    @endphp
                    ${{number_format($saldoabri, 2, ",", ".")}}
                </div>
            </div>
            <div class="section-gasto">
                @php
                $sumamay= 0;
                $restomay=0;
                @endphp
                <h3 class="title-section">MAYO 🗓</h3>
                <hr>
                @foreach($ingresosMayo as $ingresoMayo)
                <p class="p-section-ingreso">+ {{$ingresoMayo->nombre}}: ${{$ingresoMayo->importe}} <a
                    href="/editarImporte/{{$ingresoMayo->id}}" title="Editar">🖊 </a>
                <a href="/eliminarImporte/{{$ingresoMayo->id}}" title="Eliminar">| ❌</a></p>
                @php
                $restomay+=$ingresoMayo->importe;
                @endphp
                @endforeach
                @foreach ($gastosMayo as $mayo)
                <p class="p-section">- {{$mayo->servicio}}: ${{$mayo->importe}} <a
                    href="/editarGasto/{{$mayo->id}}" title="Editar"> 🖊</a>
                <a href="/eliminarGasto/{{$mayo->id}}" title="Eliminar">| ❌</a></p>
                @php
                $sumamay+=$mayo->importe;
                @endphp
                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldomay=$restomay-=$sumamay
                    @endphp
                    ${{number_format($saldomay, 2, ",", ".")}}
                </div>
            </div>
            <div class="section-gasto">
                @php
                $sumaJun= 0;
                $restoJun=0;
                @endphp
                <h3 class="title-section">JUNIO 🗓</h3>
                <hr>
                @foreach($ingresosJunio as $ingresoJunio)
                <p class="p-section-ingreso">+ {{$ingresoJunio->nombre}}: ${{$ingresoJunio->importe}} <a
                    href="/editarImporte/{{$ingresoJunio->id}}" title="Editar">🖊 </a>
                <a href="/eliminarImporte/{{$ingresoJunio->id}}" title="Eliminar">| ❌</a></p>
                @php
                $restoJun+=$ingresoJunio->importe;
                @endphp
                @endforeach
                @foreach ($gastosJunio as $junio)
                <p class="p-section">- {{$junio->servicio}}: ${{$junio->importe}} <a
                    href="/editarGasto/{{$junio->id}}" title="Editar"> 🖊</a>
                <a href="/eliminarGasto/{{$junio->id}}" title="Eliminar">| ❌</a></p>
                @php
                $sumaJun+=$junio->importe;
                @endphp
                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldojun=$restoJun-=$sumaJun
                    @endphp
                    ${{number_format($saldojun, 2, ",", ".")}}
                </div>
            </div>
            <div class="section-gasto">
                @php
                $sumaJul= 0;
                $restoJul=0;
                @endphp
                <h3 class="title-section">JULIO 🗓</h3>
                <hr>
                @foreach($ingresosJulio as $ingresoJulio)
                <p class="p-section-ingreso">+ {{$ingresoJulio->nombre}}: ${{$ingresoJulio->importe}} <a
                    href="/editarImporte/{{$ingresoJulio->id}}" title="Editar">🖊 </a>
                <a href="/eliminarImporte/{{$ingresoJulio->id}}" title="Eliminar">| ❌</a></p>
                @php
                $restoJul+=$ingresoJulio->importe;
                @endphp
                @endforeach
                @foreach ($gastosJulio as $julio)
                <p class="p-section">- {{$julio->servicio}}: ${{$julio->importe}} <a
                    href="/editarGasto/{{$julio->id}}" title="Editar"> 🖊</a>
                <a href="/eliminarGasto/{{$julio->id}}" title="Eliminar">| ❌</a></p>
                @php
                $sumaJul+=$julio->importe;
                @endphp
                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldojul=$restoJul-=$sumaJul
                    @endphp
                    ${{number_format($saldojul, 2, ",", ".")}}
                </div>
            </div>
            <div class="section-gasto">
                @php
                $sumaAg= 0;
                $restoAg=0;
                @endphp
                <h3 class="title-section">AGOSTO 🗓</h3>
                <hr>
                @foreach($ingresosAgosto as $ingresoAgosto)
                <p class="p-section-ingreso">+ {{$ingresoAgosto->nombre}}: ${{$ingresoAgosto->importe}} <a
                    href="/editarImporte/{{$ingresoAgosto->id}}" title="Editar">🖊 </a>
                <a href="/eliminarImporte/{{$ingresoAgosto->id}}" title="Eliminar">| ❌</a></p>
                @php
                $restoAg+=$ingresoAgosto->importe;
                @endphp
                @endforeach
                @foreach ($gastosAgosto as $agosto)
                <p class="p-section">- {{$agosto->servicio}}: ${{$agosto->importe}} <a
                    href="/editarGasto/{{$agosto->id}}" title="Editar"> 🖊</a>
                <a href="/eliminarGasto/{{$agosto->id}}" title="Eliminar">| ❌</a></p>
                @php
                $sumaAg+=$agosto->importe;
                @endphp
                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldoag=$restoAg-=$sumaAg
                    @endphp
                    ${{number_format($saldoag, 2, ",", ".")}}
                </div>
            </div>
            <div class="section-gasto">
                @php
                $sumaSep= 0;
                $restoSep=0;
                @endphp
                <h3 class="title-section">SEPTIEMBRE 🗓</h3>
                <hr>
                @foreach($ingresosSeptiembre as $ingresoSep)
                <p class="p-section-ingreso">+ {{$ingresoSep->nombre}}: ${{$ingresoSep->importe}} <a
                    href="/editarImporte/{{$ingresoSep->id}}" title="Editar">🖊 </a>
                <a href="/eliminarImporte/{{$ingresoSep->id}}" title="Eliminar">| ❌</a></p>
                @php
                $restoSep+=$ingresoSep->importe;
                @endphp
                @endforeach
                @foreach ($gastosSeptiembre as $septiembre)
                <p class="p-section">- {{$septiembre->servicio}}: ${{$septiembre->importe}} <a
                    href="/editarGasto/{{$septiembre->id}}" title="Editar"> 🖊</a>
                <a href="/eliminarGasto/{{$septiembre->id}}" title="Eliminar">| ❌</a></p>
                @php
                $sumaSep+=$septiembre->importe;
                @endphp
                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldosep=$restoSep-=$restoSep
                    @endphp
                    ${{number_format($saldosep, 2, ",", ".")}}
                </div>
            </div>
            <div class="section-gasto">
                @php
                $sumaOct= 0;
                $restoOct=0;
                @endphp
                <h3 class="title-section">OCTUBRE 🗓</h3>
                <hr>
                @foreach($ingresosOctubre as $ingresoOct)
                <p class="p-section-ingreso">+ {{$ingresoOct->nombre}}: ${{$ingresoOct->importe}} <a
                    href="/editarImporte/{{$ingresoOct->id}}" title="Editar">🖊 </a>
                <a href="/eliminarImporte/{{$ingresoOct->id}}" title="Eliminar">| ❌</a></p>
                @php
                $restoOct+=$ingreso->importe;
                @endphp
                @endforeach
                @foreach ($gastosOctubre as $octubre)
                <p class="p-section">- {{$octubre->servicio}}: ${{$octubre->importe}} <a
                    href="/editarGasto/{{$octubre->id}}" title="Editar"> 🖊</a>
                <a href="/eliminarGasto/{{$octubre->id}}" title="Eliminar">| ❌</a></p>
                @php
                $sumaOct+=$octubre->importe;
                @endphp
                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldoOct=$restoOct-=$sumaOct
                    @endphp
                    ${{number_format($saldoOct, 2, ",", ".")}}
                </div>
            </div>
            <div class="section-gasto">
                @php
                $sumaNov= 0;
                $restoNov=0;
                @endphp
                <h3 class="title-section">NOVIEMBRE 🗓</h3>
                <hr>
                @foreach($ingresosNoviembre as $ingresoNov)
                <p class="p-section-ingreso">+ {{$ingresoNov->nombre}}: ${{$ingresoNov->importe}} <a
                    href="/editarImporte/{{$ingresoNov->id}}" title="Editar">🖊 </a>
                <a href="/eliminarImporte/{{$ingresoNov->id}}" title="Eliminar">| ❌</a></p>
                @php
                $restoNov+=$ingresoNov->importe;
                @endphp

                @endforeach
                @foreach ($gastosNoviembre as $noviembre)
                <p class="p-section">- {{$noviembre->servicio}}: ${{$noviembre->importe}} <a
                    href="/editarGasto/{{$noviembre->id}}" title="Editar"> 🖊</a>
                <a href="/eliminarGasto/{{$noviembre->id}}" title="Eliminar">| ❌</a></p>
                @php
                $sumaNov+=$noviembre->importe;
                @endphp
                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldonov=$restoNov-=$sumaNov
                    @endphp
                    ${{number_format($saldonov, 2, ",", ".")}}
                </div>
            </div>
            <div class="section-gasto">
                @php
                $sumadic= 0;
                $restodic=0;
                @endphp
                <h3 class="title-section">DICIEMBRE 🗓</h3>
                <hr>
                @foreach($ingresosDiciembre as $ingresoDic)
                <p class="p-section-ingreso">+ {{$ingresoDic->nombre}}: ${{$ingresoDic->importe}} <a
                    href="/editarImporte/{{$ingresoDic->id}}" title="Editar">🖊 </a>
                <a href="/eliminarImporte/{{$ingresoDic->id}}" title="Eliminar">| ❌</a></p>
                @php
                $restodic+=$ingresoDic->importe;
                @endphp
                @endforeach
                @foreach ($gastosDiciembre as $diciembre)
                <p class="p-section">- {{$diciembre->servicio}}: ${{$diciembre->importe}} <a
                    href="/editarGasto/{{$diciembre->id}}" title="Editar"> 🖊</a>
                <a href="/eliminarGasto/{{$diciembre->id}}" title="Eliminar">| ❌</a></p>
                @php
                $sumadic+=$diciembre->importe;
                @endphp
                @endforeach
                <div class="total"> Saldo:
                    @php
                    $saldodic=$restodic-=$sumadic
                    @endphp
                    ${{number_format($saldodic, 2, ",", ".")}}
                </div>
            </div>

            <div class="section-gasto">

                <h3 class="title-section">TOTAL 📈</h3>
                <hr>
                <div class="total">
                    @php
                    $saldoTotal=$saldoma+$saldofe+$saldoene+$saldoabri+$saldomay+$saldojun+$saldojul+$saldoag+$saldosep+$saldoOct+$saldonov+$saldodic
                    @endphp
                    $ {{number_format($saldoTotal, 2, ",", ".")}}
                    <br>
                    @if($saldoTotal>0)
                    <p class="p-section-ingreso"> {{"Tenés saldo Positivo 😃"}}</p>
                    @else <p class="p-section">{{"No tenés fondos 😥"}}</p>
                    @endif
                </div>

            </div>
        </div>

    </div>







</x-app-layout>
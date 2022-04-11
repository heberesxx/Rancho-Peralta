<div style="text-align: center;">
    <p style="text-align: center;">Rancho Peralta</p>
</div>

<p>Generado por:@foreach($usuarios as $usuario)
    {{$usuario->name}}
    @endforeach 
</p>
<style>
    table tr {
        background-color: yellow;
    }

</style>
<table>

    <title>Ganado Resgistrado</title>
    <thead>
        <tr >
            <th class="text-center">Código</th>
            <th class="text-center"> Arete </th>
            <th class="text-center"> Nombre</th>
            <th class="text-center"> Color </th>
            <th class="text-center">Lugar </th>
            <th class="text-center">Peso (kg)</th>
            <th class="text-center">Raza</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Sexo</th>
            <th class="text-center">Edad</th>


        </tr>
    </thead>
    <tbody>
        @foreach($ganados as $ganado)
        <tr style="border-radius: 1px;">
            <td class="text-center">{{ $ganado->COD_REGISTRO_GANADO }}</td>
            <td class="text-center">{{ $ganado->NUM_ARETE }}</td>
            <td class="text-center">{{ $ganado->NOM_GANADO }}</td>
            <td class="text-center">{{ $ganado->CLR_GANADO }}</td>
            <td class="text-center">{{ $ganado->DIR_LUGAR }}</td>
            <td class="text-center">{{ $ganado->PES_ACTUAL }}</td>
            <td class="text-center">{{ $ganado->RAZ_GANADO }}</td>
            <td class="text-center">{{ $ganado->DET_ESTADO }}</td>
            <td class="text-center">{{ $ganado->SEX_GANADO }}</td>
            @if($ganado->MESES > 12)
            <td class="text-center">{{ $ganado->ANIOS.' años'}}</td>
            @elseif($ganado->DIAS > 31)
            <td class="text-center">{{$ganado->MESES.' meses'}}</td>
            @else
            <td class="text-center">{{ $ganado->DIAS.' días'}}</td>
            @endif


        </tr>
        @endforeach
    </tbody>
</table>
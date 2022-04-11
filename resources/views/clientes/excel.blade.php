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

    <title>Clientes Registrados</title>
    <thead style="background-color: #e1e2f6;">
        <tr>
            <th class="" style="width:10px;">Código </th>
            <th class="text-center">Nombre</th>
            <th class="text-center" >Apellido</th>
            <th class="text-center">Dirección</th>
            <th class="text-center" >Núm de Área</th>
            <th class="text-center" >Celular</th>
            <th class="text-center" >Status </th>

        </tr>
    </thead>
    <tbody>
        @foreach($personas as $persona)
        <tr>
            <td class="text-center" > {{ $persona->COD_CLIENTE }}</td>
            <td class="text-center" >{{ $persona->PRI_NOMBRE }}</td>
            <td class="text-center" >{{ $persona->PRI_APELLIDO }}</td>
            <td style="width: 20%;">{{ $persona->DET_DIRECCION }}</td>
            <td class="text-center">{{ $persona->NUM_AREA }}</td>
            <td class="text-center">{{ $persona->NUM_CELULAR }}</td>
            <td class="text-center">{{ $persona->IND_COMERCIAL }}</td>

        </tr>

        @endforeach
    </tbody>
</table>
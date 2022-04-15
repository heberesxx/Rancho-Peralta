
<table id="TB" class="table table-bordered table-hover US">
  
        <title>Bitácora Rancho Peralta</title>
    <thead style="background-color: #e1e2f6;">

        <tr>
            <th style="background-color: #e1e2f6;">ID </th>
            <th style="background-color: #e1e2f6;">FECHA</th>
            <th style="background-color: #e1e2f6;">USUARIO</th>
            <th style="background-color: #e1e2f6;">TABLA</th>
            <th style="background-color: #e1e2f6;">ACCIÓN</th>
            <th style="background-color: #e1e2f6;">DESCRIPCIÓN</th>


        </tr>
    </thead>
    <tbody>

        @foreach ($bitacoras as $bitacora)
        <tr>
            <td>{{ $bitacora->id }}</td>
            <td>{{\Carbon\Carbon::parse($bitacora->fecha)->format('d-m-Y') }}</td>
            <td>{{ $bitacora->usuario }}</td>
            <td>{{ $bitacora->tabla }}</td>
            <td>{{ $bitacora->accion }}</td>
            <td>{{ $bitacora->descripccion }}</td>

        </tr>
        @endforeach

    </tbody>
</table>
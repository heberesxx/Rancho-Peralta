<div class="card-body">
    <div class="box-header">

        <table id="TB" class="table table-bordered table-hover US">
            <thead style="background-color: #e1e2f6;">
                <tr>
                    <th>Lote</th>
                    <th>Fecha de Compra</th>
                    <th>Proveedor</th>

                    <th>Nombre Ganado</th>
                    <th>Precio</th>
                    <th>Estado Ganado</th>
                    <th>Lugar</th>




                </tr>
            </thead>
            <tbody>
                @foreach($lotes as $lote)
                <tr>
                    <td>{{$lote->COD_COMPRA_GANADO }}</td>
                    <td>{{\Carbon\Carbon::parse( $lote->FEC_COMPRA)->format('d-m-Y') }}</td>
                    <td>{{ $lote->PROVEEDOR}}</td>

                    <td>{{ $lote->NOM_GANADO }}</td>
                    <td>{{ $lote->PRE_GANADO }}</td>
                    <td>{{ $lote->DET_ESTADO }}</td>
                    <td>{{ $lote->DIR_LUGAR }}</td>



                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
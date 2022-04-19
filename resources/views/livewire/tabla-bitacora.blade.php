<div>
    <div class="w-full flex">
        <div class="w-1/6 mx-1">
            <input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Buscar...">
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model="orderBy" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="id">ID</option>
                <option value="fecha">Fecha</option>
                <option value="usuario">Usuario</option>
                <option value="tabla">Tabla</option>
                <option value="accion">Acción</option>
                <option value="descripccion">Descripción</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option value="1">Ascendente</option>
                <option value="0">Descendente</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1">
            <a href="{{route('bita.pdf')}}" target="_blank" class="block appearance-none w-full bg-red  text-white py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-center">EXPORTAR A PDF</a>
        </div>
        <div class="w-1/6 relative mx-1">
            <a href="{{route('exportar.bitacora')}}" target="_blank" class="block appearance-none w-full bg-green  text-white py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 text-center">EXPORTAR A EXCEL</a>
        </div>
    </div> </br>
    @if($bitacoras->isNotEmpty())
    <table id="TB" class="table table-bordered table-hover US">
        <thead style="background-color: #e1e2f6;">
            <tr>
                <th class="text-center">ID </th>
                <th class="text-center">FECHA</th>
                <th class="text-center">USUARIO</th>
                <th class="text-center">TABLA</th>
                <th class="text-center">ACCIÓN</th>
                <th class="text-center" style="width: auto;">DESCRIPCIÓN</th>


            </tr>
        </thead>
        <tbody>

            @foreach ($bitacoras as $bitacora)
            <tr>
                <td class="text-center">{{ $bitacora->id }}</td>
                <td>{{\Carbon\Carbon::parse($bitacora->fecha)->format('d-m-Y') }}</td>
                <td>{{ $bitacora->usuario }}</td>
                <td style="width: 20%">{{ $bitacora->tabla }}</td>
                <td>{{ $bitacora->accion }}</td>
                <td style="width: auto;">{{ $bitacora->descripccion }}</td>

            </tr>
            @endforeach

        </tbody>
    </table>
    

    <div class="d-flex justify-content-between">
        <p>Mostrando registros del {{$bitacoras->firstItem()}} al {{$bitacoras->lastItem()}}
                @php echo count($bitacoras) @endphp
        </p>
        {!! $bitacoras->links() !!}
    </div>
    

    @else
    <p class="text-center">Lo sentimos, no encontramos un registro para su búsqueda.</p>
    @endif
</div>
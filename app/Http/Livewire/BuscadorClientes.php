<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
use Livewire\WithPagination;
use Livewire\Component;

class BuscadorClientes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_cliente;
    public $nombre;

    public function render()
    {
        $clientes = Clientes::where('PRI_NOMBRE', 'like', '%' . $this->buscador . '%')->where('IND_COMERCIAL', '=', 'ACTIVO')
            ->orderBy('PRI_NOMBRE')->paginate(10);
        return view('livewire.buscador-clientes')->with('clientes', $clientes);
    }

    public function seleccionar()
    {

        if ($this->selected_cliente !== null) {
            //dd(Proveedores::all());
            $this->cliente = Clientes::find($this->selected_cliente);
            $this->nombre = $this->cliente->PRI_NOMBRE . ' ' . $this->cliente->PRI_APELLIDO;
            // dd($this->producto_live);
        }
    }
}

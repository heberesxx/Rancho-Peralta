<?php

namespace App\Http\Livewire;

use App\Models\Proveedores;
use Livewire\WithPagination;
use Livewire\Component;

class BuscadorProveedores extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_proveedor;
    public $nombre;

    public function render()
    {
        $proveedores=Proveedores::where('PRI_NOMBRE', 'like', '%' . $this->buscador . '%')->where('IND_COMERCIAL', '=', 'ACTIVO')
        ->orderBy('PRI_NOMBRE')->paginate(5);
;        ;
        return view('livewire.buscador-proveedores')->with('proveedores', $proveedores);
    }

    public function seleccionar()
    {
        
        if ($this->selected_proveedor !== null) {
            //dd(Proveedores::all());
            $this->proveedor = Proveedores::find($this->selected_proveedor);
            $this->nombre = $this->proveedor->PRI_NOMBRE. ' ' .$this->proveedor->PRI_APELLIDO;
           // dd($this->producto_live);
        }
    }

}

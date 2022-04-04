<?php

namespace App\Http\Livewire;
use App\Models\Estados;
use Livewire\WithPagination;
use Illuminate\Support\MessageBag;
use Livewire\Component;

class BuscadorEditarEstados extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_estado;
    public $nombre;
    public $codigo_estado;
    public $detalle;

    
    public function render()
    {
        $estados=Estados::where('DET_ESTADO', 'like', '%' . $this->buscador . '%') ->orderBy('COD_ESTADO')->paginate(7);
        return view('livewire.buscador-editar-estados')->with('estados', $estados);
    }
    public function seleccionar()
    {
        
        if ($this->selected_estado !== null) {
            $this->codigo_estado=0;
            //dd(Proveedores::all());
            $this->estado = Estados::find($this->selected_estado);
            $this->nombre = $this->estado->DET_ESTADO;
           // dd($this->producto_live);
        }
    }
}

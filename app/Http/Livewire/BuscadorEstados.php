<?php

namespace App\Http\Livewire;
use Illuminate\Support\MessageBag;
use App\Models\Estados;
use Livewire\WithPagination;
use Livewire\Component;

class BuscadorEstados extends Component
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
        $estados=Estados::where('DET_ESTADO', 'like', '%' . $this->buscador . '%')->where('STATUS', '=', 'ACTIVO') ->orderBy('COD_ESTADO')->paginate(7);
        return view('livewire.buscador-estados')->with('estados', $estados);
    }
    public function seleccionar()
    {
        //dd($this->selected_estado);

        if ($this->selected_estado !== null) {
            //dd(Proveedores::all());
            $this->codigo_estado=0;
            $this->estado = Estados::find($this->selected_estado);
            $this->nombre = $this->estado->DET_ESTADO;
           // dd($this->producto_live);
        }
    }
}

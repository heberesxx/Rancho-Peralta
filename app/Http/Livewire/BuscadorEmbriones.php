<?php

namespace App\Http\Livewire;
use App\Models\Embriones;
use Livewire\WithPagination;


use Livewire\Component;

class BuscadorEmbriones extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_embrion;
    public $nombre;

    public function render()
    {
        $embriones=Embriones::where('COD_EMBRION', 'like', '%' . $this->buscador . '%')->where('IND_EMBRION', '=', 'DISPONIBLE')->orderBy('COD_EMBRION')->paginate(10);
        return view('livewire.buscador-embriones')->with('embriones', $embriones);
    }

    public function seleccionar()
    {
        
        if ($this->selected_embrion !== null) {
            //dd(Proveedores::all());
            $this->embrion = Embriones::find($this->selected_embrion);
            $this->nombre = 'Embrión N° : '.$this->embrion->COD_EMBRION. 'Raza Donadora: ' .$this->embrion->RAZ_VACA_DONADORA. 'Raza Donador: ' .$this->embrion->RAZ_TORO_DONADOR;
           // dd($this->producto_live);
        }
    }
}

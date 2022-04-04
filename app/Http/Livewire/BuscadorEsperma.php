<?php

namespace App\Http\Livewire;
use App\Models\Esperma;
use Livewire\WithPagination;

use Livewire\Component;
use Symfony\Component\HttpKernel\HttpCache\Esi;

class BuscadorEsperma extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_esperma;
    public $nombre;

    public function render()
    {
        $espermas=Esperma::where('COD_ESPERMA', 'like', '%' . $this->buscador . '%')->where('IND_ESPERMA', '=', 'DISPONIBLE')->orderBy('NUM_PAJILLA')->paginate(10);
        return view('livewire.buscador-esperma')->with('espermas', $espermas);
    }

    public function seleccionar()
    {
        
        if ($this->selected_esperma !== null) {
            //dd(Proveedores::all());
            $this->esperma = Esperma::find($this->selected_esperma);
            $this->nombre = 'Número de pajilla: '.$this->esperma->NUM_PAJILLA. ' Raza del donador: ' .$this->esperma->RAZ_TORO_DONADOR;
           // dd($this->producto_live);
        }
    }
}

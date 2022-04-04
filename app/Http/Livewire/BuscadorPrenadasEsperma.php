<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ganado;
use App\Models\PrenadasEsperma;
use App\Models\Lugares;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class BuscadorPrenadasEsperma extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_vacaspe;
    public $nombre;
  
    public function render()
    {
        $vacaspe = DB::select('select * from recienparidas_esperma');
        return view('livewire.buscador-prenadas-esperma')->with('vacaspe', $vacaspe);
    }

    public function seleccionar()
    {
        if ($this->selected_vacaspe !== null) {
            //dd(Proveedores::all());
            $this->vacape = Ganado::find($this->selected_vacaspe);
            $this->nombre = 'Nombre: '. $this->vacape->NOM_GANADO.', Arete N°: '. $this->vacape->NUM_ARETE;
           // dd($this->producto_live);
        }
    }
    
}

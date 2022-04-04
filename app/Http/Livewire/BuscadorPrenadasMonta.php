<?php

namespace App\Http\Livewire;

use App\Models\Ganado;
use App\Models\PrenadasMonta;
use App\Models\Lugares;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class BuscadorPrenadasMonta extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_vacaspmonta;
    public $nombre;
    public function render()
    {
        $vacaspem = DB::select('select * from recienparidas_monta');
        return view('livewire.buscador-prenadas-monta')->with('vacaspe', $vacaspem);
    }

    public function seleccionar()
    {
        if ($this->selected_vacaspmonta !== null) {
            //dd(Proveedores::all());
            $this->vacaspem = Ganado::find($this->selected_vacaspmonta);
            $this->nombre = 'Nombre: '. $this->vacaspem->NOM_GANADO.', Arete N°: '. $this->vacaspem->NUM_ARETE;
           // dd($this->producto_live);
        }
    }
}

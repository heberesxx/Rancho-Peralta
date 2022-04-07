<?php

namespace App\Http\Livewire;
use App\Models\Ganado;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class BuscadorOrdenio extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_vacas;
    public $nombre;

    public function render()
    {
        $ganados = DB::select('select * from vacas_paridas');
        //dd($ganados);
        return view('livewire.buscador-ordenio')->with('ganados', $ganados);
     
    }

    public function seleccionar()
    {
        
        if ($this->selected_vacas !== null) {
            //dd(Proveedores::all());
            $this->ganado = Ganado::find($this->selected_vacas);
            $this->nombre = $this->ganado->NOM_GANADO;

           // dd($this->producto_live);
        }
    }
}

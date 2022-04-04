<?php

namespace App\Http\Livewire;
use App\Models\Ganado;
use App\Models\Razas;
use App\Models\Lugares;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class VacasSincronizadas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_vacas;
    public $nombre;
    public $search = '';
    public $orderAsc = true;
    public $perPage = 10;
    public $orderBy = 'COD_REGISTRO_GANADO';

    public function render()
    {
        $vacass = DB::select('select * from vacas_sincronizadas');
        return view('livewire.vacas-sincronizadas')->with('vacass', $vacass);

      
       
    }

    public function seleccionar()
    {
        
        if ($this->selected_vacas !== null) {
            //dd(Proveedores::all());
            $this->vaca = Ganado::find($this->selected_vacas);
            $this->nombre = 'Nombre: '. $this->vaca->NOM_GANADO.', Número Arete: '. $this->vaca->NUM_ARETE;
           // dd($this->producto_live);
        }
    }
}

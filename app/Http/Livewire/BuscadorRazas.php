<?php

namespace App\Http\Livewire;
use App\Models\Razas;
use Livewire\WithPagination;
use Livewire\Component;

class BuscadorRazas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_raza;
    public $nombre;
    public $codigo_raza;
    public $detalle;

    public function render()
    {
        $razas=Razas::where('NOM_RAZA', 'like', '%' . $this->buscador . '%')->where('IND_RAZA', '=', 'ACTIVO')
        ->orderBy('COD_RAZA')->paginate(10);
        return view('livewire.buscador-razas')->with('razas', $razas);

        
    }
    public function seleccionar()
    {
        
        if ($this->selected_raza !== null) {
            //dd(Proveedores::all());
            $this->codigo_raza=0;
            $this->raza = Razas::find($this->selected_raza);
            $this->nombre = $this->raza->NOM_RAZA;
           // dd($this->producto_live);
        }
    }
}

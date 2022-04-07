<?php

namespace App\Http\Livewire;
use App\Models\Ganado;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class BuscadorGanadoVenta extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_ganadoventa;
    public $nombre;
    public $arete;
    public $peso;
    public $color;
    public $sexo;

    public function render()
    {
        $ganados = DB::select('select * from ganado_general_ventas');
        //DD($ganados);
        return view('livewire.buscador-ganado-venta')->with('ganados', $ganados);

    }

    public function seleccionar()
    {
        
        if ($this->selected_ganadoventa !== null) {
            //dd(Proveedores::all());
            $this->ganado = Ganado::find($this->selected_ganadoventa);
            $this->nombre = $this->ganado->NOM_GANADO;
            $this->arete = $this->ganado->NUM_ARETE;
            $this->peso = $this->ganado->PES_ACTUAL;
            $this->color = $this->ganado->CLR_GANADO;
            $this->sexo = $this->ganado->SEX_GANADO;

           // dd($this->producto_live);
        }
    }
}

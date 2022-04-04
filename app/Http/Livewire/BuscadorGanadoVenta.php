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
        $ganados=Ganado::where('NOM_GANADO','like','%'.$this->buscador. '%')->where('COD_ESTADO', '<>','51')->where('COD_ESTADO', '<>','5')->where('COD_ESTADO', '<>','8')->orderBy('COD_REGISTRO_GANADO')->paginate(7);
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

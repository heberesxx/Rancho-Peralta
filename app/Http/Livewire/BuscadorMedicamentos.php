<?php

namespace App\Http\Livewire;
use App\Models\Medicamento;
use Livewire\WithPagination;

use Livewire\Component;

class BuscadorMedicamentos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_medicamento;
    public $nombre;

    public function render()
    {
        $medicamentos=Medicamento::where('NOM_MEDICAMENTO', 'like', '%' . $this->buscador . '%') ->orderBy('COD_MEDICAMENTO')->paginate(7);
        return view('livewire.buscador-medicamentos')->with('medicamentos', $medicamentos);


    }
    public function seleccionar()
    {
        
        if ($this->selected_medicamento !== null) {
            //dd(Proveedores::all());
            $this->medicamento = Medicamento::find($this->selected_medicamento);
            $this->nombre = $this->medicamento->NOM_MEDICAMENTO;
           // dd($this->producto_live);
        }
    }
}

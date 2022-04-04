<?php

namespace App\Http\Livewire;
use App\Models\Pregunta;
use Livewire\WithPagination;
use Livewire\Component;

class BuscadorPreguntas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $buscador;
    public $selected_pregunta;
    public $nombre;

    public function render()
    {
        $preguntas = Pregunta::where('pregunta','like','%'.$this->buscador .'%');
        return view('livewire.buscador-preguntas')->with('preguntas', $preguntas);
    }

    public function seleccionar()
    {
        
        if ($this->selected_pregunta !== null) {
            //dd(Proveedores::all());
            $this->pregunta = Pregunta::find($this->selected_pregunta);
            $this->nombre = $this->pregunta->pregunta;
           // dd($this->producto_live);
        }
    }
}

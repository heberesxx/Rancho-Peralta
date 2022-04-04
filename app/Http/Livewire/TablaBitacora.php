<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use App\Models\Bitacora;
use Livewire\Component;
use  Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TablaBitacora extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  public $perPage = 10;
  public $search = '';
  public $orderBy = 'id';
  public $orderAsc = true;

  

  public function render()
  {
    // $bitacoras = Bitacora::all();
    //$bitacoras = Bitacora::orderby('id','desc');
    return view('livewire.tabla-bitacora', [
      'bitacoras' => Bitacora::search($this->search)
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->simplePaginate($this->perPage),
    ]);
  }
}

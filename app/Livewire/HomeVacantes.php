<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    public $salario;
    public $categoria;
    public $termino;

    protected $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($salario, $categoria, $termino){

        $this-> salario = $salario;
        $this-> categoria = $categoria;
        $this-> termino = $termino;
    }

    public function render()
    {
        $vacantes = Vacante::when($this->termino, function($query){
            $query->where('titulo', 'like', "%" . $this->termino . "%");
        })
        ->when($this->categoria, function($query){
            $query->where('categoria_id', $this->categoria);
        })
        ->when($this->salario, function($query){
            $query->where('salario_id', $this->salario);
        })
        ->when($this->termino, function($query){
            $query->orWhere('empresa', 'like', "%" . $this->termino . "%");
        })
        ->paginate(10);

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}

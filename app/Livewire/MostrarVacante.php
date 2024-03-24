<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacante extends Component
{
    public $vacante;

    protected $listeners = ['aplicar'];

    public function aplicar( Vacante $vacante)
    {
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.mostrar-vacante');
    }
}

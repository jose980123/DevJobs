<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante){
        $this->vacante = $vacante;
    }

    public function postularme( Vacante $vacante){
        $this->validate();

        $datos = $this->validate();

        //almacenar la cv
        $cv = $this->cv->store('public/cv');
        //eliminar de la direccion de la cv 'public/cv/'
        $datos['cv'] = str_replace('public/cv/', '', $cv);


        //crear candidato vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        //crear notificacion y enviar email
        $this->vacante->reclutador->notify(new NuevoCandidato(
            $this->vacante->id, $this->vacante->titulo, auth()->user()->id
        ));

        //mostrar el usuario un mensaje de ok
        session()->flash('mensaje', 'se envio correctamente la informacion, mucha suerte!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}

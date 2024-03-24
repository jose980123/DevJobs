<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_new;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_new' => 'nullable|image|max:1024'
    ];
    
    public function mount( Vacante $vacante){
        $this->id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->descripcion = $vacante->descripcion;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante(){
        $datos = $this->validate();

        //Si hay una imagen
        if($this->imagen_new){
            $imagen = $this->imagen_new->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }
        //encontrar la vacante editar
        $vacante = Vacante::find($this->id);
        //asignar los valores
        $vacante-> titulo = $datos['titulo'];
        $vacante-> salario_id = $datos['salario'];
        $vacante-> categoria_id = $datos['categoria'];
        $vacante-> empresa = $datos['empresa'];
        $vacante-> ultimo_dia = $datos['ultimo_dia'];
        $vacante-> descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;
        //guardar la vacante
        $vacante->save();
        //redireccionar
        session()->flash('mensaje', 'La vacante se actualizo correctamente');
        
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante',
        [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}

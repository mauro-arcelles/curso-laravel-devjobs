<?php

namespace App\Livewire;

use App\Models\Vacante;
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

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        // almacenar cv en storage
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // crear candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->id(),
            'cv' => $datos['cv']
        ]);

        // crear notificacion y enviar email

        // mostrar mensaje de ok
        session()->flash('mensaje', 'Se envió correctamente tu postulación');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}

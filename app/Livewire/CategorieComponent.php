<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categorie;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CategorieComponent extends Component
{
    use LivewireAlert;
    public $nombre;
    public $categories = [];
    public $modal = false;

    protected $rules = [
        'nombre' => 'required|min:3',
    ];

    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
    ];

    public function mount()
    {
        $this->categories = Categorie::all();
    }

    public function render()
    {
        return view('livewire.categorie-component');
    }

    public function open_modal()
    {
        $this->modal = true;
    }

    public function close_modal()
    {
        $this->modal = false;
        $this->nombre = '';
    }

    public function create_categorie()
    {
        $this->validate();

        Categorie::create([
            'nombre' => $this->nombre
        ]);

        $this->alert('success', 'Creado Exitosamente');
        $this->mount();
        $this->close_modal();
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categorie;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CategorieComponent extends Component
{
    use LivewireAlert;
    public $id;
    public $nombre;
    public $categories = [];
    public $modal = false;
    public $isOpenModaCreate = false;

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
        $this->isOpenModaCreate = true;
    }

    public function close_modal()
    {
        $this->modal = false;
        $this->isOpenModaCreate = false;
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

    public function delete_categorie($id){
        $categoria = Categorie::find($id);
        $this->alert('success', $categoria->nombre.' '.'Eliminado!');
        $categoria->delete();
        $this->mount();
    }

    public function open_modal_editar(Categorie $categoria)
    {
        $this->modal = true;
        $this->id = $categoria->id;
        $this->nombre = $categoria->nombre;
    }

    public function update_categorie()
    {
        Categorie::find($this->id)
        ->update([
            'nombre' => $this->nombre
        ]);

        $this->alert('success', 'Información Actualizada');
        $this->mount();
        $this->close_modal();
    }
}
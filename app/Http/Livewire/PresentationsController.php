<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Presentation;
use Livewire\withPagination; //trait paginacion

class PresentationsController extends Component
{
    use withPagination;
    public $name, $description, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;

      public function mount(){
        $this->pageTitle = 'Listado';
        $this->componentName = 'Presentaciones';
    }

    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        if(strlen($this->search) > 0)
            $data = Presentation::where('name', 'like', '%'.$this->search.'%')->paginate($this->pagination);
        else
            $data = Presentation::orderBy('id','desc')->paginate($this->pagination);

        return view('livewire.presentation.presentations',['presentations'=>$data])
        ->extends('layouts.theme.app')
        ->section('content');
    }

       public function Store(){
        $rules = [
            'name'=>'required|unique:presentations|min:3',
            'description'=>'required|min:10'
        ];

        $messages = [
            'name.required' => 'Nombre de la presentación es requerido',
            'name.unique' => 'Ya existe el nombre de la presentación',
            'name.min' => 'El nombre de la presentación debe tener al menos 3 caracteres',
            'description.required' => 'La descripción de la presentación es requerida',
            'description.min' => 'La descripción de la presentación debe tener al menos 10 caracteres'
        ];

        $this->validate($rules, $messages);

        $presentation = Presentation::create([
            'name'=> $this->name,
            'description' => $this->description
        ]);

        $this->resetUI();
        $this->emit('presentation-added','Presentacion registrada');
    }



    public function Edit(Presentation $presentation){
        $this->name = $presentation->name;
        $this->description = $presentation->description;
        $this->selected_id = $presentation->id;
        $this->emit('show-modal', 'show modal!'); 
    }


      public function Update(){
        $rules=[
            'name' => "required|min:3|unique:presentations,name,{$this->selected_id}",
            'description'=>'required|min:10'
        ];

        $messages =[
            'name.required' => 'Nombre de la presentación es requerido',
            'name.unique' => 'Ya existe el nombre de la presentación',
            'name.min' => 'El nombre de la presentación debe tener al menos 3 caracteres',
            'description.required' => 'La descripción de la presentación es requerida',
            'description.min' => 'La descripción de la presentación debe tener al menos 10 caracteres'
        ];
         $this->validate($rules, $messages);

         $presentation = Presentation::find($this->selected_id);
         $presentation->update([
            'name' => $this->name,
            'description' => $this->description
         ]);

         $this->resetUI();
         $this->emit('presentation-update','Presentacion Actualizada');
    }

    protected $listeners=[
        'deleteRow' => 'Destroy'
    ];

    public function Destroy(Presentation $presentation){
        $presentation->delete();
         $this->resetUI();
         $this->emit('category-delete','Categoria Eliminada');
    }

    public function resetUI(){
        $this->name='';
        $this->description='';
        $this->search='';
        $this->selected_id=0;
    }
}

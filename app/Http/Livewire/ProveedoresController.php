<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedores;
use Livewire\withPagination;

class ProveedoresController extends Component
{
    use withPagination; 
    public $search, $selected_id, $pageTitle, $componentName, $nombreProveedor , $telefonoProveedor ,$direccionProveedor;
    private $pagination = 5;

      public function mount(){
        $this->pageTitle = 'Listado';
        $this->componentName = 'Proveedores';
    }

    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }



    public function render()
    {
        if(strlen($this->search) > 0)
            $data = Proveedores::where('nombreProveedor', 'like', '%'.$this->search.'%')->paginate($this->pagination);
        else
            $data = Proveedores::orderBy('id','desc')->paginate($this->pagination);

        return view('livewire.proveedores.proveedores',[
            'Proveedores' => $data
        ])->extends('layouts.theme.app')
        ->section('content');
    }

    public function Store(){
        $rules = [
            'nombreProveedor'=>'required|unique:proveedores|min:3',
            'telefonoProveedor'=>'required|min:8',
            'direccionProveedor'=>'required|min:10'
        ];

        $messages = [
            'nombreProveedor.required' => 'Nombre de el proveedor es requerido',
            'nombreProveedor.unique' => 'El proveedor ya existe',
            'nombreProveedor.min' => 'El proveedor debe tener al menos 3 caracteres',
            'telefonoProveedor.required' => 'telefono de el proveedor es requerido',
            'telefonoProveedor.min' => 'El telefono debe tener al menos 8 caracteres',
            'direccionProveedor.required' => 'Direccion de el proveedor es requerido',
            'direccionProveedor.min' => 'La direccion debe tener al menos 10 caracteres',
            
        ];

        $this->validate($rules, $messages);

        $proveedor = Proveedores::create([
            'nombreProveedor'=> $this->nombreProveedor,
            'telefonoProveedor' => $this->telefonoProveedor,
            'direccionProveedor' => $this->direccionProveedor
        ]);

        $this->resetUI();
        $this->emit('proveedor-added','Proveedor registrado');
    }


     public function Edit(Proveedores $proveedor){ 
        $this->nombreProveedor = $proveedor->nombreProveedor;
        $this->telefonoProveedor = $proveedor->telefonoProveedor;
        $this->direccionProveedor = $proveedor->direccionProveedor;
        $this->selected_id = $proveedor->id;

        $this->emit('show-modal', 'show modal!'); 
    }

       public function Update(){
        $rules=[
            'nombreProveedor'=>"required|unique:proveedores,nombreProveedor,{$this->selected_id}|min:3",
            'telefonoProveedor'=>'required|min:8',
            'direccionProveedor'=>'required|min:10'
        ];

        $messages =[
            'nombreProveedor.required' => 'Nombre de el proveedor es requerido',
            'nombreProveedor.unique' => 'El proveedor ya existe',
            'nombreProveedor.min' => 'El proveedor debe tener al menos 3 caracteres',
            'telefonoProveedor.required' => 'telefono de el proveedor es requerido',
            'telefonoProveedor.min' => 'El telefono debe tener al menos 8 caracteres',
            'direccionProveedor.required' => 'Direccion de el proveedor es requerido',
            'direccionProveedor.min' => 'La direccion debe tener al menos 10 caracteres',
        ];
         $this->validate($rules, $messages);

         $proveedor = Proveedores::find($this->selected_id);
         $proveedor->update([
            'nombreProveedor'=> $this->nombreProveedor,
            'telefonoProveedor' => $this->telefonoProveedor,
            'direccionProveedor' => $this->direccionProveedor
         ]);

         $this->resetUI();
         $this->emit('proveedor-update','Categoria Actualizada');
    }

     protected $listeners=[
        'deleteRow' => 'Destroy'
    ];

     public function Destroy(Proveedores $proveedor){
        $proveedor->delete();
         $this->resetUI();
         $this->emit('category-delete','Proveedor Eliminado');
    }




    public function resetUI(){
         $this->nombreProveedor=''; 
         $this->telefonoProveedor=''; 
         $this->direccionProveedor='';
    }
}

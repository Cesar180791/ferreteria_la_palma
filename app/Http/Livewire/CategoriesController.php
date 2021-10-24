<?php

namespace App\Http\Livewire; 

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Storage; //facade para manipular imagenes en laravel
use Livewire\withFileUploads; // trait para subir imagenes
use Livewire\withPagination; //trait paginacion


class CategoriesController extends Component
{ 
    use withFileUploads;
    use withPagination;

    public $name, $description, $image, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;

    public function mount(){
        $this->pageTitle = 'Listado';
        $this->componentName = 'Categorías';
    }

    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        if(strlen($this->search) > 0)
            $data = Category::where('name', 'like', '%'.$this->search.'%')->paginate($this->pagination);
        else
            $data = Category::orderBy('id','desc')->paginate($this->pagination);

        return view('livewire.category.categories', ['categories'=>$data])
        ->extends('layouts.theme.app')
        ->section('content'); 
    }

    public function Edit($id){
        $record = Category::find($id,['id','name','description','image']);
        $this->name = $record->name;
        $this->description = $record->description;
        $this->selected_id = $record->id;
        $this->image = null;

        $this->emit('show-modal', 'show modal!'); 
    }

    public function Store(){
        $rules = [
            'name'=>'required|unique:categories|min:3',
            'description'=>'required|min:10'
        ];

        $messages = [
            'name.required' => 'Nombre de la categoría es requerido',
            'name.unique' => 'Ya existe el nombre de la categoría',
            'name.min' => 'El nombre de la categoría debe tener al menos 3 caracteres',
            'description.required' => 'La descripción de la categoria es requerida',
            'description.min' => 'La descripción de la categoría debe tener al menos 10 caracteres'
        ];

        $this->validate($rules, $messages);

        $category = Category::create([
            'name'=> $this->name,
            'description' => $this->description
        ]);

        $customFileName;
        if($this->image){
            $customFileName = uniqid().'_.'.$this->image->extension();
            $this->image->storeAs('public/categorias', $customFileName);
            $category->image = $customFileName;
            $category->save();
        }

        $this->resetUI();
        $this->emit('category-added','Categoría registrada');
    }

    public function Update(){
        $rules=[
            'name' => "required|min:3|unique:categories,name,{$this->selected_id}",
            'description'=>'required|min:10'
        ];

        $messages =[
            'name.required' => 'Nombre de la categoría es requerido',
            'name.min'=> 'El nombre de la categoría debe tener al menos 3 caracteres',
            'name.unique'=> 'Ya existe el nombre de la categoría',
            'description.required' => 'La descripción de la categoria es requerida',
            'description.min' => 'La descripción de la categoría debe tener al menos 10 caracteres'
        ];
         $this->validate($rules, $messages);

         $category = Category::find($this->selected_id);
         $category->update([
            'name' => $this->name,
            'description' => $this->description
         ]);

         if($this->image){
            $customFileName = uniqid().'_.'.$this->image->extension();
            $this->image->storeAs('public/categorias/', $customFileName);
            $imageName = $category->image;

            $category->image = $customFileName;
            $category->save();

            if ($imageName !=null) {
                if (file_exists('storage/categorias/'.$imageName)) {
                    unlink('storage/categorias/'. $imageName);
                }
            }
         }
         $this->resetUI();
         $this->emit('category-update','Categoria Actualizada');
    }

    protected $listeners=[
        'deleteRow' => 'Destroy'
    ];

    public function Destroy(Category $category){
        //$category = Category::find($id);
       // dd($category);
        $imageName = $category->image; ///imagen temporal
        $category->delete();

        if($imageName !=null){
             unlink('storage/categorias/'. $imageName);
        }
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

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SubCategory;
use App\Models\Category;
use Livewire\withPagination; //trait paginacion

class SubCategoriesController extends Component 
{
    use withPagination; /*Traits de paginacion */

    public $name,$description,$search,$selected_id,$pageTitle,$componentName,$categoryid;
    private $pagination = 5;
 
     public function mount(){
        $this->pageTitle = 'Listado';
        $this->componentName = 'Sub-Categorías';
        $this->categoryid = 'Seleccionar';
    }

     public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        if (strlen($this->search) > 0)
            $sub_categories = SubCategory::join('categories as c','c.id','sub_categories.category_id')
                            ->select('sub_categories.*','c.name as category')
                            ->where('sub_categories.name','like', '%' . $this->search . '%')
                            ->orWhere('c.name','like', '%' . $this->search . '%')
                            ->orderBy('sub_categories.id','desc')
                            ->paginate($this->pagination);
        else
             $sub_categories = SubCategory::join('categories as c','c.id','sub_categories.category_id')
                            ->select('sub_categories.*','c.name as category')
                            ->orderBy('sub_categories.id','desc')
                            ->paginate($this->pagination);


        return view('livewire.subCategory.sub-categories' ,[
            'data'=>$sub_categories,
            'categories'=>Category::orderBy('name', 'asc')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function Store(){
        $rules =[
            'name'=>'required|unique:sub_categories|min:3',
            'description'=>'|required|min:10',
            'categoryid'=>'required|not_in:Seleccionar'
        ];

        $messages=[
            'name.required'=>'Nombre de SubCategoría Requerido',
            'name.unique'=>'Ya existe el nombre de la SubCategoría',
            'name.min'=>'El nombre de la SubCategoría debe tener al menos 3 caracteres',
            'description.required'=>'La descripcion de la SubCategoría es Requerida',
            'description.min'=>'La descripcion de la SubCategoría debe tener minimo 10 caracteres',
            'categoryid.not_in'=>'Elige un Nombre de Categoría diferente de "Seleccionar"'
        ];
         $this->validate($rules, $messages);

         $sub_categories = SubCategory::create([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->categoryid
         ]);

         $this->resetUI();
         $this->emit('subCategory-added','SubCategoría registrada');
    }

    public function Edit(SubCategory $subcategory){
        $this->name = $subcategory->name;
        $this->description = $subcategory->description;
        $this->selected_id = $subcategory->id;
        $this->categoryid = $subcategory->category_id;

        $this->emit('show-modal', 'show modal!'); 
    }


       public function Update(){
        $rules =[
            'name'=>"required|min:3|unique:sub_categories,name,{$this->selected_id}",
            'description'=>'|required|min:10',
            'categoryid'=>'required|not_in:Seleccionar'
        ];

        $messages=[
            'name.required'=>'Nombre de SubCategoría Requerido',
            'name.unique'=>'Ya existe el nombre de la SubCategoría',
            'name.min'=>'El nombre de la SubCategoría debe tener al menos 3 caracteres',
            'description.required'=>'La descripcion de la SubCategoría es Requerida',
            'description.min'=>'La descripcion de la SubCategoría debe tener minimo 10 caracteres',
            'categoryid.not_in'=>'Elige un Nombre de Categoría diferente de "Seleccionar"'
        ];
         $this->validate($rules, $messages);

         $sub_categories = SubCategory::find($this->selected_id);
         $sub_categories ->update([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->categoryid
         ]);

         $this->resetUI();
         $this->emit('subCategory-update','SubCategoría Modificada');
    }






    /*
      public function Edit($id){
        $record = SubCategory::find($id,['id','name','description','category_id']);
        $this->name = $record->name;
        $this->description = $record->description;
        $this->selected_id = $record->id;
        $this->categoryid = $record->category_id;

        $this->emit('show-modal', 'show modal!'); 
    }
    */

       public function resetUI(){
        $this->name='';
        $this->description='';
        $this->search='';
        $this->categoryid='Seleccionar';
        $this->selected_id=0;
    }

    protected $listeners=['deleteRow' => 'Destroy'];

    public function Destroy(SubCategory $subcategory){
        $subcategory->delete();

        $this->resetUI();
        $this->emit('subCategory-deleted', 'SubCategoría Eliminada');
    }
}

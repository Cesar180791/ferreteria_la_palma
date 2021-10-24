<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SubCategory;
use App\Models\Presentation;
use App\Models\Product;
use Livewire\withPagination; //trait paginacion

class ProductsController extends Component
{
    use withPagination;

    public $name,$price, $IVAprice, $priceIVA, $search, $selected_id, $pageTitle, $componentName, $subCategoryId,$presentationId, $quantity;
    private $pagination = 5;

      public function mount(){
        $this->pageTitle = 'Listado';
        $this->componentName = 'Inventario';
        $this->subCategoryId = 'Seleccionar';
        $this->presentationId = 'Seleccionar';
    }

     public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
         if ($this->price == null) {
            $this->price=0;
        }
        $this->IVAprice = $this->price * 0.13;
        $this->priceIVA = $this->price + $this->IVAprice;

        if (strlen($this->search) > 0)
            $products = Product::join('sub_categories as c','c.id','products.sub_category_id')->join('presentations as b','b.id','products.presentation_id')
                            ->select('products.*','c.name as sub_category','b.name as presentation')
                            ->where('products.name','like', '%' . $this->search . '%')
                            ->orWhere('c.name','like', '%' . $this->search . '%')
                            ->orWhere('b.name','like', '%' . $this->search . '%')
                            ->orderBy('products.id','desc')
                            ->paginate($this->pagination);
        else
             $products = Product::join('sub_categories as c','c.id','products.sub_category_id')->join('presentations as b','b.id','products.presentation_id')
                            ->select('products.*','c.name as sub_category','b.name as presentation')
                            ->orderBy('products.id','desc')
                            ->paginate($this->pagination);

        return view('livewire.product.products',[
            'products'=>$products,
            'sub_categories'=>SubCategory::orderBy('name','asc')->get(),
            'presentations'=>Presentation::orderBy('name','asc')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }


     public function Store(){
        

        $rules =[
            'name'=>'required|min:3',
            'price'=>'|required',
            'presentationId'=>'required|not_in:Seleccionar',
            'subCategoryId'=>'required|not_in:Seleccionar'
        ];

        $messages=[
            'name.required'=>'Nombre del producto es Requerido',
            'name.min'=>'El nombre del producto debe tener al menos 3 caracteres',
            'price.required'=>'Precio es Requerido',
            'presentationId.not_in'=>'Elige una presentación diferente de "Seleccionar"',
            'subCategoryId.not_in'=>'Elige una SubCategoría diferente de "Seleccionar"'
        ];
         $this->validate($rules, $messages);
    

         $product = Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'IVAprice' => $this->IVAprice,
            'priceIVA' => $this->priceIVA,
            'presentation_id' => $this->presentationId,
            'sub_category_id' => $this->subCategoryId,
         ]);

         $this->resetUI();
         $this->emit('product-added','Producto registrado');
    }

    public function Edit(Product $producto){
         $this->selected_id = $producto->id;
        $this->name = $producto->name;
        $this->price = $producto->price;
        $this->IVAprice = $producto->IVAprice;
        $this->priceIVA = $producto->priceIVA;
        $this->presentationId = $producto->presentation_id;
        $this->subCategoryId = $producto->sub_category_id;


        $this->emit('show-modal', 'show modal!'); 
    }

   public function Update(){
        $rules =[

            'name'=>'required|min:3',
            'price'=>'|required',
            'presentationId'=>'required|not_in:Seleccionar',
            'subCategoryId'=>'required|not_in:Seleccionar'
        ];

        $messages=[
           'name.required'=>'Nombre del producto es Requerido',
            'name.min'=>'El nombre del producto debe tener al menos 3 caracteres',
            'price.required'=>'Precio es Requerido',
            'presentationId.not_in'=>'Elige una presentación diferente de "Seleccionar"',
            'subCategoryId.not_in'=>'Elige una SubCategoría diferente de "Seleccionar"'
        ];
         $this->validate($rules, $messages);

         $product = Product::find($this->selected_id);
         $product ->update([
            'name' => $this->name,
            'price' => $this->price,
            'IVAprice' => $this->IVAprice,
            'priceIVA' => $this->priceIVA,
            'presentation_id' => $this->presentationId,
            'sub_category_id' => $this->subCategoryId,
         ]);

         $this->resetUI();
         $this->emit('product-update','producto Modificado');
    }

    protected $listeners=['deleteRow' => 'Destroy'];

    public function Destroy(Product $product){
        $product->delete();
        $this->resetUI();
        $this->emit('product-deleted', 'Producto Eliminado');
    }

    public function resetUI(){
        $this->name = '';
        $this->price = 0;
        $this->IVAprice = 0; 
        $this->priceIVA = 0;
        $this->search = '';
        $this->selected_id = 0;
        $this->quantity = 0;
        $this->subCategoryId = 'Seleccionar';
        $this->presentationId = 'Seleccionar';
    }

}

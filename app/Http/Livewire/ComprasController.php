<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Darryldecode\Cart\Facades\CartFacade as Cart; 
use DB;

class ComprasController extends Component
{
    use WithPagination;
    private $pagination = 5;
    public $total, $itemsQuantity, $efectivo, $change, $search;

    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }

    public function mount(){
        $this->efectivo = 0;
        $this->change = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
    }

    public function render()
    {
        if (strlen($this->search) > 0)
            $products = Product::join('sub_categories as c','c.id','products.sub_category_id')
                            ->select('products.*','c.name as sub_category')
                            ->where('products.name','like', '%' . $this->search . '%')
                            ->orWhere('c.name','like', '%' . $this->search . '%')
                            ->orderBy('products.id','desc')
                            ->paginate($this->pagination);
        else
             $products = Product::join('sub_categories as c','c.id','products.sub_category_id')
                            ->select('products.*','c.name as sub_category')
                            ->orderBy('products.id','desc')
                            ->paginate($this->pagination);


        return view('livewire.compras.compras',[
            'products' => $products,
            'cart' => Cart::getContent()->sortBy('name')
        ])->extends('layouts.theme.app')
        ->section('content');


    }

    protected $listeners = [ 
        'add-item' => 'addItem',
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveSale' => 'saveSale',
        'reset' => 'resetUI'
    ]; 

       public function addItem($id, $cant = 1){

        $product = Product::where('id', $id)->first();


        if($product == null){
            $this->emit('producto-no-encontrado','El producto no esta registrado');
        } else {
            if ($this->InCart($product->id)) {
                $this->increaseQty($product->id);
                return;
            }
            Cart::add($product->id,$product->name,$product->cost,$cant,array($cost=0, $IVAcost=0, $costIVA=0, $product->price, $product->IVAprice,$product->priceIVA));
                $this->total = Cart::getTotal();
                $this->emit('add-ok','El Producto ha sido agregado');
        }
    }

    public function InCart($productId){
        $exist = Cart::get($productId);
        if ($exist) 
            return true;
        else 
            return false;
    }

    public function updateCost($productId, $cost){
        $title ='';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if ($exist)
           $title = 'Cantidad Actualizada';
       else
            $title = 'producto Agregado';


       $this->removeItem($productId);

       if($cost > 0) {
        $IVAcost = $cost * 0.13;
        $costIVA = $cost + $IVAcost;
         Cart::add($product->id,$product->name,$product->cost,$product->quantity,array($cost, $IVAcost, $costIVA, $product->price, $product->IVAprice,$product->priceIVA));
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('add-ok', $title);
       }

    }


     public function removeItem($productId){
        Cart::remove($productId);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('add-ok','Producto eliminado');
    }








     public function resetUI(){
        $this->resetPage();
         $this->search='';
    }

}

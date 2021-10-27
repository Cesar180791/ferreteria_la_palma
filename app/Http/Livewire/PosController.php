<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Denomination;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetails;
use Livewire\WithPagination;
use Darryldecode\Cart\Facades\CartFacade as Cart; 
use DB;

class PosController extends Component
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
        if ($this->efectivo > 0) {
             $this->change = ($this->efectivo - $this->total);
        }
        $this->itemsQuantity = Cart::getTotalQuantity();
       
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
        return view('livewire.pos.pos',[
            'products' => $products,
            'denominations' => Denomination::orderBy('type','asc')->get(),
            'cart' => Cart::getContent()->sortBy('name')
        ])->extends('layouts.theme.app')->section('content');
    }

    public function Acash($value){
        $this->efectivo += ($value == 0 ? $this->total : $value);
        $this->change = ($this->efectivo - $this->total);
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

            if ($product->quantity <1 ) {
                $this->emit('no-stock', 'Stock Insuficiente');
                return;
                }
            
                Cart::add($product->id,$product->name,$product->priceIVA,$cant);
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


    public function increaseQty($productId, $cant = 1){
        $title ='';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if ($exist)
           $title = 'Cantidad Actualizada';
       else
            $title = 'producto Agregado'; 


        if($exist){

            if ($product->quantity < ($cant + $exist->quantity)) {
                $this->emit('no-stock', 'Stock insuficiente');
                return;
            }
        }

        Cart::add($product->id,$product->name,$product->priceIVA,$cant);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

       // $this->emit('add-ok', $title);

    }


     public function updateQty($productId, $cant = 1){
        $title ='';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if ($exist)
           $title = 'Cantidad Actualizada';
       else
            $title = 'producto Agregado';


        if($exist){
            if ($product->quantity < $cant ) {
            $this->emit('no-stock', 'stock insuficiente');
            return;
        }
    }

       $this->removeItem($productId);

       if($cant > 0) {
           Cart::add($product->id,$product->name,$product->priceIVA,$cant);
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

    public function decreaseQty($productId){
        $item = Cart::get($productId);
        Cart::remove($productId);

        $newQty = ($item->quantity)-1;

        if($newQty > 0)
            Cart::add($item->id, $item->name, $item->price, $newQty);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        //$this->emit('add-ok','Cantidad Actualiada');
    }



    public function clearCart(){
        Cart::clear();

        $this->efectivo = 0;
        $this->change = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('add-ok','Carrito Vacio');

    }


    public function saveSale(){
     
        if($this->total <=0){
            $this->emit('sale-error','Agrega productos al detalle');
            return;
        }
         if($this->efectivo <=0){
            $this->emit('sale-error','Ingrese el efectivo');
            return;
        }
         if($this->total > $this->efectivo){
            $this->emit('sale-error','El efectivo debe ser mayor o igual al total');
            return;
        }

        DB::beginTransaction();

        try {
            $sale = Sale::create([
                'total' => $this->total,
                'items' => $this->itemsQuantity,
                'cash' => $this->efectivo,
                'change' => $this->change,
                'user_id' => auth()->user()->id
            ]);
            if ($sale) {

                ///se crea el registro en la tabla ventas se busca en el carrito el detalle 
                $items = Cart::getContent();
                
                ///se recorre el detalle para guardar en la tabla detalle de ventas 
                foreach($items as $item){
                    SaleDetails::create([
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'product_id' => $item->id,
                        'sale_id' => $sale->id
                    ]);

                    //inicio actualizar la cantidad de cupones

                    $product = Product::find($item->id);
                    $product->quantity =  $product->quantity - $item->quantity;
                    $product->save();
             

                     //Fin  actualizar la cantidad de cupones
                }

            }


            DB::commit();
            Cart::clear();
            $this->efectivo = 0;
            $this->change = 0;

            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('sale-ok','Venta Registrada');
            $this->emit('print-ticket',$sale->id);

 

        } catch (Exception $e) {
            DB::rollback();
             $this->emit('sale-error',$e->getMessage());
        }

    }

    public function printTicket($sale){
        ///pendiente
        return Redirect::to("print://$sale->id");
    }

    public function resetUI(){
        $this->resetPage();
         $this->search='';
    }

}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Proveedores;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use Livewire\WithPagination;
use Darryldecode\Cart\Facades\CartFacade as Cart; 
use DB;

class ComprasController extends Component
{
    use WithPagination;
    private $pagination = 5;
    public $total, $itemsQuantity, $efectivo, $change, $search, $proveedor, $image, $factura;

    public function paginationView(){
        return 'vendor.livewire.bootstrap'; 
    }

    public function mount(){
        $this->efectivo = 0;
        $this->change = 0;
        $this->proveedor='Seleccionar';
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
            'cart' => Cart::getContent()->sortBy('name'),
            'proveedores' => Proveedores::orderBy('nombreProveedor','asc')->get(),
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
            Cart::add(
                $product->id,
                $product->name,
                $totalDetalle=0,
                $cant,
                array(
                    $cost=0, 
                    $IVAcost=0, 
                    $costIVA=0, 
                    $product->price, 
                    $product->IVAprice,
                    $product->priceIVA
                ));
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
        $exist->price = $costIVA;
         Cart::add(
             $product->id,
             $product->name,
             $exist->price,
             $exist->quantity,
             array(
                 $cost, 
                 $IVAcost, 
                 $costIVA, 
                 $exist->attributes[3],
                 $exist->attributes[4],
                 $exist->attributes[5]
                ));
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            //$this->emit('add-ok', $title);
       }

    }

    public function updateCant($productId, $cant = 1){
        $title ='';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if ($exist)
           $title = 'Cantidad Actualizada';
       else
            $title = 'producto Agregado';
            
       $this->removeItem($productId);
       if ($cant > 0) {
           Cart::add(
               $product->id,
               $product->name,
               $exist->price,
               $cant,
               array(
                   $exist->attributes[0],
                   $exist->attributes[1],
                   $exist->attributes[2],
                   $exist->attributes[3],
                   $exist->attributes[4],
                   $exist->attributes[5]
                ));
           $this->total = Cart::getTotal();
           $this->itemsQuantity = Cart::getTotalQuantity();
           //$this->emit('add-ok', $title);
       }
    }



     public function removeItem($productId){
        Cart::remove($productId);
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
       // $this->emit('add-ok','Producto eliminado');
    }


    public function updatePrice($productId, $price){
        $title ='';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if ($exist)
           $title = 'Cantidad Actualizada';
       else
            $title = 'producto Agregado';


       $this->removeItem($productId);

       if($price > 0) {
        $IVAprice = $price * 0.13;
        $priceIVA = $price + $IVAprice;
         Cart::add(
             $product->id,
             $product->name,
             $exist->price,
             $exist->quantity,
             array(
                    $exist->attributes[0],
                    $exist->attributes[1],
                    $exist->attributes[2],
                    $price,
                    $IVAprice,
                    $priceIVA
                    ));
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            //$this->emit('add-ok', $title);
       }

    }


    public function increaseQty($productId, $cant = 1){
        $title ='';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if ($exist)
           $title = 'Cantidad Actualizada';
       else
            $title = 'producto Agregado'; 


            Cart::add(
                $exist->id,
                $exist->name,
                $exist->price,
                $cant,
                array(
                    $exist->attributes[0],
                    $exist->attributes[1],
                    $exist->attributes[2],
                    $exist->attributes[3],
                    $exist->attributes[4],
                    $exist->attributes[5]
                 ));
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

       // $this->emit('add-ok', $title);

    }




    public function saveShop(){
     
        if($this->total <=0){
            $this->emit('sale-error','Agrega productos al detalle');
            return;
        }



        DB::beginTransaction();

        try {
            $rules = [
                'proveedor'=>'required|not_in:Seleccionar',
                'factura'=>'required|unique:purchases|min:3'
            ];
    
            $messages = [
                'proveedor.not_in'=>'Elige una opcion diferente de "Seleccionar"',
                'factura.required' => 'Numero de factura es requerido',
                'factura.unique' => 'Este numero de factura ya ha sido ingresado con otra compra',
                'factura.min' => 'El numero de factura debe tener al menos 3 caracteres',
            ];
    
            $this->validate($rules, $messages);
            $purchase = Purchase::create([
                'total' => $this->total,
                'item' => $this->itemsQuantity,
                'factura' => $this->factura,
                'user_id' => auth()->user()->id,
                'proveedores_id' => $this->proveedor
            ]);
            if ($purchase) {

                ///se crea el registro en la tabla compras se busca en el carrito el detalle 
                $items = Cart::getContent();
                
                ///se recorre el detalle para guardar en la tabla detalle de ventas 
                foreach($items as $item){
                    PurchaseDetail::create([
                        'purchases_id' => $purchase->id,
                        'product_id' => $item->id,
                        'cost' => $item->attributes[0],
                        'IVAcost' => $item->attributes[1],
                        'costIVA' => $item->attributes[2],
                        'price' => $item->attributes[3],
                        'IVAprice' => $item->attributes[4],
                        'priceIVA' => $item->attributes[5],
                        'quantity' => $item->quantity
                    ]);

                    //inicio actualizar la cantidad de cupones

                    $product = Product::find($item->id);

                    if ($product->quantity == 0) {
                        $product->quantity = $item->quantity;
                    } else{
                        $product->quantity += $item->quantity;
                    }
                    if($product->cost == 0){
                            $product->cost = $item->attributes[0];
                            $product->IVAcost = $item->attributes[1];
                            $product->costIVA = $item->attributes[2];
                      }else {
                        $product->cost = ($product->cost + $item->attributes[0]) / 2;
                        $product->IVAcost = ($product->IVAcost + $item->attributes[1]) / 2;
                        $product->costIVA = ($product->costIVA + $item->attributes[2]) / 2;
                      }

                      $product->price = $item->attributes[3];
                      $product->IVAprice = $item->attributes[4];
                      $product->priceIVA = $item->attributes[5];
                      $product->save();
        

                     //Fin  actualizar la cantidad de cupones
                }

            }
            DB::commit();
            Cart::clear();
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('purchase-ok','Compra Registrada');

        } catch (Exception $e) {
            DB::rollback();
            $this->emit('purchase-error',$e->getMessage());
        }

    }


     public function resetUI(){
        $this->resetPage();
         $this->search='';
    }

}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Denomination;
use App\Models\Product;
use Livewire\withPagination;

class PosController extends Component
{
    use withPagination;
    private $pagination = 10;

    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }

    public $total=10, $itemsQuantity=1, $cart=[], $denominations=[], $efectivo, $change, $search;
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

        $this->denominations = Denomination::all();
        return view('livewire.pos.pos',[
            'products' => $products
        ])->extends('layouts.theme.app')->section('content');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use Carbon\Carbon;

class ReportComprasController extends Component
{
    public $componentName, $data, $details, $sumDetails, $countDetails, $reportType, $userId, $dateFrom, $dateTo, $saleId, $IVACost,$total;

    public function mount(){ 
        $this->componentName = 'Reporte de Compras';
        $this->data=[];
        $this->details=[];
        $this->sumDetails=0;
        $this->countDetails=0;
        $this->reportType=0;
        $this->userId=0;
        $this->saleId=0;
    }

    public function render()
    {
        $this->SalesByDate();
        return view('livewire.report-compras.report-compras',[
             'users' => User::orderBy('name','asc')->get()
        ])->extends('layouts.theme.app')->section('content');
    }

      public function SalesByDate(){
        if ($this->reportType == 0) { //Ventas del dia
           $from = Carbon::parse(Carbon::now('America/El_Salvador'))->format('Y-m-d') . ' 00:00:00';
           $to = Carbon::parse(Carbon::now('America/El_Salvador'))->format('Y-m-d') . ' 23:59:59';
        } else { //ventas fechas especificadas por el usuario
           $from = Carbon::parse($this->dateFrom)->format('Y-m-d') . ' 00:00:00';
           $to = Carbon::parse($this->dateTo)->format('Y-m-d') . ' 23:59:59';
        }


        if($this->reportType == 1 && ($this->dateFrom == '' || $this->dateTo == '' )){
            return; 
        }
        if ($this->userId == 0) {
            $this->data = Purchase::join('users as u', 'u.id', 'purchases.users_id')
            ->join('proveedores as pro','pro.id','purchases.proveedores_id')
            ->select('purchases.*','u.name as user','pro.nombreProveedor')
            ->whereBetween('purchases.created_at',[$from,$to])->get();

        } else{
             $this->data = Purchase::join('users as u', 'u.id', 'purchases.users_id')
            ->join('proveedores as pro','pro.id','purchases.proveedores_id')
            ->select('purchases.*','u.name as user','pro.nombreProveedor')
            ->whereBetween('purchases.created_at',[$from,$to])
            ->where('users_id', $this->userId)
            ->get();
        }
                
    }

    public function getDetails($saleId){
        $this->details = PurchaseDetail::join('products as p','p.id','purchase_details.product_id')
        ->select('purchase_details.*','p.name as product')
        ->where('purchase_details.purchases_id',$saleId)
        ->get();

        $suma = $this->details->sum(function($item){
            return $item->cost * $item->quantity;
        });

         $IVA = $this->details->sum(function($item2){
            return $item2->IVACost * $item2->quantity;
        });
      
        $this->sumDetails = $suma;
        $this->countDetails = $this->details->sum('quantity');
        $this->saleId = $saleId;
        $this->IVACost = $IVA;
        $this->total = $this->sumDetails + $this->IVACost;

        $this->emit('show-modal','Detalle Cargado'); 
    }





}

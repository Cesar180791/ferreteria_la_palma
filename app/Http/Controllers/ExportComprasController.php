<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;

use App\Models\User;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use Carbon\Carbon;

class ExportComprasController extends Controller
{
    public function reportCompraPDF($userId, $reportType,$dateFrom=null,$dateTo=null){
        $data= [];

        if ($reportType == 0) 
        {
           $from = Carbon::parse(Carbon::now('America/El_Salvador'))->format('Y-m-d') . ' 00:00:00';
           $to = Carbon::parse(Carbon::now('America/El_Salvador'))->format('Y-m-d') . ' 23:59:59';

        } else { 

           $from = Carbon::parse($dateFrom)->format('Y-m-d') . ' 00:00:00';
           $to = Carbon::parse($dateTo)->format('Y-m-d') . ' 23:59:59';

        }

        if ($userId == 0) {
            $data = Purchase::join('users as u', 'u.id', 'purchases.users_id')
            ->join('proveedores as pro','pro.id','purchases.proveedores_id')
            ->select('purchases.*','u.name as user','pro.nombreProveedor')
            ->whereBetween('purchases.created_at',[$from,$to])->get();


        } else{
            $data = Purchase::join('users as u', 'u.id', 'purchases.users_id')
            ->join('proveedores as pro','pro.id','purchases.proveedores_id')
            ->select('purchases.*','u.name as user','pro.nombreProveedor')
            ->whereBetween('purchases.created_at',[$from,$to])
            ->where('users_id', $userId)
            ->get();
        }

        $user = $userId == 0 ? 'Todos' : User::find($userId)->name;
        $pdf = PDF::loadView('pdf.reporteCompras', compact('data','reportType','user','dateFrom','dateTo'));
        
        return $pdf->stream('pruchasesReport.pdf');
        return $pdf->download('purchasesReport.pdf');

    }
}

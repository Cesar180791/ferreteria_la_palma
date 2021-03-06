<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\User;
use App\Models\SaleDetails;
class ExportController extends Controller
{
    public function reportVentaPDF($userId, $reportType,$dateFrom=null,$dateTo=null){
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
            $data = Sale::join('users as u', 'u.id', 'sales.users_id')
            ->select('sales.*','u.name as user')
            ->whereBetween('sales.created_at',[$from,$to])->get();

        } else{
             $data = Sale::join('users as u', 'u.id', 'sales.users_id') 
            ->select('sales.*','u.name as user')
            ->whereBetween('sales.created_at',[$from,$to])
            ->where('users_id', $userId)
            ->get();
        }

        $user = $userId == 0 ? 'Todos' : User::find($userId)->name;
        $pdf = PDF::loadView('pdf.reporteVentas', compact('data','reportType','user','dateFrom','dateTo'));
        
        return $pdf->stream('salesReport.pdf');
        return $pdf->download('salesReport.pdf');

    }
}

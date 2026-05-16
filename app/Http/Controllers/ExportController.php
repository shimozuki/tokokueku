<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;

use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function sales()
    {
        return Excel::download(

            new SalesExport,

            'laporan-penjualan.xlsx'
        );
    }
}

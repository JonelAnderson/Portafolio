<?php

namespace App\Http\Controllers;
use PDF;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generateInvoicePDF()
    {
        $pdf = PDF::loadView('myPDF');

        return $pdf->download('nicesnippets.pdf');
    }
}

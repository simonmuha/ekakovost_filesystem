<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PDF;

class PDFController extends Controller
{
    //
    public function generatePDF()
    {
        $data = ['title' => 'domPDF in Laravel 10'];
        $pdf = PDF::loadView('app.PDF.document', $data);
        return $pdf->download('document.pdf'); 
    }
}

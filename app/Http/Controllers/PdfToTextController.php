<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;

class PdfToTextController extends Controller
{
    public function index(){
        return "Hello Muhit";
    }

    public function store(Request $request){
        // dd($request->all());
        $file = $request->file;
        $pdfParser = new Parser;
        $pdf = $pdfParser->parseFile($file->path());
        $content = $pdf->getText();
        $text = explode('SOFTWARE ENGINEER', $content, 2 );
        $text = $text[0];

    //-- split the lines
    $lines = explode( "\n", $text );

    return array(
        'paper_title'   => $lines[0] . $lines[1],
        'author'        => $lines[2]
    );


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\HtmlSnippet;
use App\Models\Link;
use App\Models\Pdf;
use Illuminate\Http\Request;

class ResourceController
{
    public function getPdfs(Request $request)
    {
        $pdfs = Pdf::query()->paginate();

        return view('user/home', ['pdfs' => $pdfs]);
    }

    public function getSnippets(Request $request)
    {
        $snippets = HtmlSnippet::query()->paginate(5);

        return view('user/snippets', ['snippets' => $snippets]);
    }

    public function getLinks(Request $request)
    {
        $pdfs = Link::query()->paginate();

        return view('user/links', ['links' => $pdfs]);
    }

    public function downloadPdf(Pdf $pdf)
    {
        return response()->download($pdf->path, "$pdf->title.pdf");
    }
}